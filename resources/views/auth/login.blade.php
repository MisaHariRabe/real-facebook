<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Facebook - Connexion ou inscription</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-sans bg-slate-50 m-0 p-0 flex justify-center items-center min-h-screen">
    <div class="flex justify-center items-center w-full max-w-5xl p-6 flex-wrap">
        <div class="flex-1 pr-12 mb-10">
            <center>
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" width="108" height="108" fill="#1877f2"
                    class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </center>
            <h2 class="text-base font-normal leading-normal text-slate-900">
                Avec Facebook, partagez et restez en contact avec votre entourage.
            </h2>
        </div>
        <div class="flex-1 max-w-96 flex flex-col items-center">
            <form action="{{ route('login') }}" method="POST"
                class="bg-white p-5 rounded-lg w-full shadow-md box-border flex flex-col items-stretch">
                @csrf

                <input type="email" name="email" placeholder="Adresse e-mail" aria-label="Adresse e-mail"
                    class="px-4 py-3.5 mb-3 rounded border border-gray-200 box-border focus:outline-none focus:border-blue-500 focus:shadow-sm">
                <input type="password" name="password" placeholder="Mot de passe" aria-label="Mot de passe"
                    class="px-4 py-3.5 mb-3 rounded border border-gray-200 box-border focus:outline-none focus:border-blue-500 focus:shadow-sm">

                @error('email')
                    <p class="login-error" style="text-align: center">{{ $message }}</p>
                @enderror
                <button type="submit"
                    class="bg-[#1877f2] text-white text-lg font-bold cursor-pointer transition-[background-color] duration-[0.2s] mb-4 px-4 py-3 rounded-md border-[none] hover:bg-[#166fe5]">Se
                    connecter</button>
                <hr class="mb-5 border-t-[#dadde1] border-t">
                <a href="{{ route('register') }}"
                    class="bg-[#42b72a] text-white text-base font-bold cursor-pointer self-center transition-[background-color] duration-200 mb-2.5 px-4 py-3 rounded-md border-none hover:bg-[#36a420]">Créer
                    nouveau compte</a>
            </form>
        </div>
    </div>
</body>

</html>
