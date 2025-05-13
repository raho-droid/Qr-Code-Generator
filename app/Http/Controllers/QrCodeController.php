<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QrCodeController extends Controller
{
  public function generateAndSend(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'email' => 'required|email',
        ]);

        $url = $request->input('url');
        $email = $request->input('email');
        $filename = Str::uuid() . '.png';
        $relativePath = 'qrcodes/' . $filename;
        $fullPath = public_path($relativePath);

        // QR kod oluşturma
        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new ImagickImageBackEnd()
        );

        $writer = new Writer($renderer);
        $imageData = $writer->writeString($url);

        file_put_contents($fullPath, $imageData);

        // QR kodu mail olarak gönder
        Mail::send('emails.qr', ['url' => $url], function ($message) use ($email, $fullPath) {
            $message->to($email)
                    ->subject('QR Kodunuz')
                    ->attach($fullPath);
        });

        // Veritabanına kaydet
        QrCode::create([
            'url' => $url,
            'email' => $email,
            'image_path' => $relativePath, // public altındaki yol
        ]);

        return response()->json([
            'message' => 'QR kod oluşturuldu, e-posta gönderildi ve veritabanına kaydedildi.',
            'file_url' => asset($relativePath),
        ]);
    }
}