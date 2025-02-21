<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - أكاديمية المحترفين</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: "IBM Plex Sans Arabic", sans-serif; }
    </style>
</head>
<body class="bg-[#1B263B] flex items-center justify-center min-h-screen">

    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden grid grid-cols-1 lg:grid-cols-2 max-w-4xl mx-auto">

            <!-- ✅ صورة الملعب -->
            <div class="relative hidden lg:block">
                <img src="{{ asset('stadium.webp') }}" alt="ملعب كرة القدم" class="w-full h-full object-cover">
            </div>

            <!-- ✅ نموذج تسجيل الدخول -->
            <div class="p-8 flex flex-col justify-center w-full">
                <h2 class="text-2xl font-bold text-[#1B263B] text-center mb-6">تسجيل الدخول</h2>

                @if (session('error'))
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 mb-2">رقم الهاتف</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#FFD700] @error('phone') border-red-500 @enderror" placeholder="01123456789">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">كلمة المرور</label>
                        <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#FFD700] @error('password') border-red-500 @enderror" placeholder="********">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="w-full bg-[#FFD700] text-white font-bold py-3 rounded hover:bg-[#e6c300] transition">تسجيل الدخول</button>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
