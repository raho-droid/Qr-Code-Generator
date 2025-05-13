import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head } from "@inertiajs/react";
import { useForm } from "@inertiajs/react";
export default function Welcome() {
    const { data, setData, post } = useForm({
        email: "",
        url: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("create.qr"));
    };

    return (
        <>
            <Head title="Hoşgeldiniz" />
            <div className="bg-gray-50 text-black/50  dark:text-white/50 min-h-screen flex items-center justify-center">
                <form
                    onSubmit={submit}
                    className="p-6 bg-white dark:bg-gray-900 rounded shadow-md w-full max-w-md"
                >
                    <div className="flex justify-center py-2">
                        <h4>
                            Ücretsiz Qr Kod Oluşturucu - (Free Qr Code
                            Generator)
                        </h4>
                    </div>
                    <div>
                        <InputLabel htmlFor="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            name="email"
                            className="mt-1 block w-full"
                            value={data.email}
                            onChange={(e) => setData("email", e.target.value)}
                            autoComplete="username"
                            isFocused={true}
                        />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="url" value="URL" />
                        <TextInput
                            id="url"
                            type="text"
                            name="url"
                            className="mt-1 block w-full"
                            value={data.url}
                            onChange={(e) => setData("url", e.target.value)}
                        />
                    </div>

                    <div className="mt-4 flex items-center justify-end">
                        <PrimaryButton className="ms-4">
                            QR Gönder
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </>
    );
}
