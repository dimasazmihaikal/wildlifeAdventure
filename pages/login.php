<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../css/output.css">
</head>
<body>

    <div class="w-screen h-screen flex flex-col justify-center items-center">
        <a href="" class="text-6xl font-bold pb-3 text-[bg-[#221e37]]">Wildlife Adventure</a>
        <div class="w-1/4 h-auto bg-[#221e37] rounded-lg py-10">
            <div class="p-6">
                <h1 class="text-white font-bold text-5xl">LOGIN</h1>
                <form action="./php/proses_login.php" method="POST">
                    <div class="pt-6">
                        <label for="username" class="text-white font-semibold text-xl">Username</label>
                        <input type="text" name="username" id="username" class="bg-white border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" placeholder="Username Anda" required>
                    </div>
                        <label for="password" class="text-white font-semibold text-xl">Password</label>
                        <input type="password" name="password" id="password" class="bg-white border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" placeholder="••••••••" required>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" name="submit" class="mt-6 w-1/2 font-bold text-xl text-langit bg-white hover:bg-slate-600 hover:text-white rounded-lg px-5 py-2.5 text-center">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
