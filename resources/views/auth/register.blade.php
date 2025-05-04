<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire à Facebook | Facebook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body
    class="[font-family:Helvetica,Arial,sans-serif] bg-[#f0f2f5] flex justify-center items-center min-h-screen box-border m-0 p-0">
    <div class="flex justify-center items-start w-full max-w-[980px] flex-wrap gap-5 pt-[72px] pb-28 px-0">
        <div class="flex-1 max-w-[500px] text-center pr-0 pt-10">
            <center>
                <svg class="h-[106px] inline-block -ml-7 mr-0 -mt-5 mb-0" xmlns="http://www.w3.org/2000/svg"
                    width="106" height="106" fill="#1877f2" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </center>
        </div>
        <div class="flex-1 max-w-[430px] flex flex-col items-center">
            <div
                class="bg-white shadow-[0_2px_4px_rgba(0,0,0,0.1),0_8px_16px_rgba(0,0,0,0.1)] w-full box-border text-center pt-2.5 pb-6 px-4 rounded-lg">
                <div>
                    <h2 class="text-[25px] leading-8 font-semibold text-[#1c1e21] mt-2.5 mb-0 mx-0">S’inscrire</h2>
                    <p class="text-[15px] leading-6 text-[#606770] mt-0 mb-2.5 mx-0">C’est rapide et facile.</p>
                </div>
                <hr class="-mx-4 my-2.5 border-t-[#dadde1] border-[none] border-t border-solid">
                <form action="{{ route('register') }}" method="POST" class="pt-4 pb-0 px-0"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="text" placeholder="Nom complet" aria-label="Nom complet" name="name"
                        class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">
                    <input type="text" placeholder="Nom d'utilisateur" aria-label="Nom d'utilisateur" name="username"
                        class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">
                    <input type="email" placeholder="Adresse e-mail" aria-label="Adresse e-mail" name="email"
                        class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">
                    <input type="password" placeholder="Mot de passe" aria-label="Mot de passe" name="password"
                        class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">
                    <input type="password" placeholder="Confirmer le mot de passe"
                        aria-label="Confirmer le mot de passe" name="password_confirmation"
                        class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">

                    <div class="text-left mt-2.5 mb-[5px] mx-0">
                        <label for="birthday" class="text-xs block mb-0.5">Date de naissance</label>
                        <input type="date" id="birthday" name="date_of_birth" aria-label="Date de naissance"
                            class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">
                    </div>


                    <div class="text-left mt-2.5 mb-[5px] mx-0">
                        <label id="gender-label" class="text-xs block mb-0.5">Sexe</label>
                        <div class="flex gap-2.5 justify-start mb-2.5" aria-labelledby="gender-label">
                            <span
                                class="border rounded flex-1 max-w-[calc(50%_-_5px)] flex justify-between items-center h-9 box-border px-2.5 py-2 border-solid border-[#ccd0d5]">
                                <label for="female" class="text-[15px] text-[#1c1e21] m-0">Femme</label>
                                <input type="radio" id="female" name="gender" value="female" class="m-0"
                                    checked>
                            </span>
                            <span
                                class="border rounded flex-1 max-w-[calc(50%_-_5px)] flex justify-between items-center h-9 box-border px-2.5 py-2 border-solid border-[#ccd0d5]">
                                <label for="male" class="text-[15px] text-[#1c1e21] m-0">Homme</label>
                                <input type="radio" id="male" name="gender" value="male" class="m-0">
                            </span>
                        </div>
                    </div>

                    <div class="text-left mt-2.5 mb-[5px] mx-0">
                        <label for="profile_picture" class="text-xs block mb-0.5">Photo de profil</label>
                        <input type="file" id="profile_picture" name="profile_photo" accept="image/*"
                            class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]">
                    </div>

                    <div class="text-left mt-2.5 mb-[5px] mx-0">
                        <label for="bio" class="text-xs block mb-0.5">Bio</label>
                        <textarea id="bio" name="bio" placeholder="Parlez-nous de vous..." aria-label="Bio"
                            class="border text-[15px] box-border bg-[#f5f6f7] w-full h-[38px] leading-[normal] mb-2.5 p-[11px] rounded-[5px] border-solid border-[#dddfe2]"></textarea>
                    </div>


                    <p class="text-[#777] text-[11px] leading-[1.34] text-left mx-0 my-[1em]">
                        En cliquant sur S’inscrire, vous acceptez nos <a href="#"
                            class="text-[#385898] no-underline hover:underline">Conditions générales</a>,
                        notre <a href="#" class="text-[#385898] no-underline hover:underline">Politique de
                            confidentialité</a> et notre <a href="#"
                            class="text-[#385898] no-underline hover:underline">Politique
                            d’utilisation des cookies</a>. Vous recevrez peut-être des notifications par texto de notre
                        part et vous pouvez à tout moment vous désabonner.
                    </p>
                    <button type="submit"
                        class="bg-[#00a400] text-white text-lg font-semibold cursor-pointer transition-[background-color] duration-[0.2s] block min-w-[194px] box-border mx-auto my-2.5 px-8 py-2.5 rounded-md border-[none] hover:bg-[#008a00]">S'inscrire</button>
                </form>
                <a href="{{ route('login') }}"
                    class="block text-[#1877f2] text-[17px] font-medium text-center no-underline mt-5 px-0 py-2.5 hover:underline">Vous
                    avez déjà un compte ?</a>
            </div>
        </div>
    </div>
    <script type="module" src="script.js"></script>
</body>

</html>
