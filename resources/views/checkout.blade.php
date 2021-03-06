<style>
    section {
        font-family: 'Inter', sans-serif;
    }
</style>

<link rel="stylesheet" href="{{ url('assets/css/loader.css') }}" />

<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<!-- Specify a custom Tailwind configuration -->
<script type="tailwind-config">
    {
  theme: {
    extend: {
      colors: {
        gray: colors.blueGray,
        pink: colors.fuchsia,  
      }
    }
  }
}
</script>

<!-- Snippet -->
<section class="flex flex-col justify-center antialiased text-gray-600 min-h-screen p-4">
    <div class="h-full">
        <!-- Card -->
        <div class="max-w-[360px] mx-auto">
            <div id="loader-wrapper" class="loader-wrapper">
                <div class="loader is-loading">
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg mt-9">
                <!-- Card header -->
                <header class="text-center container px-5 pb-5">
                    <!-- Avatar -->
                    <img alt="logo image" src="{{ url('assets/img/logo.png') }}" class="inline-flex -mt-9 w-[128px] h-[128px] fill-current rounded-full box-content mb-3" viewBox="0 0 72 72">
                    </img>
                    <!-- Card name -->
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Fatturato da SkuSkins s.r.l.</h3>
                    <div class="text-sm font-medium text-gray-500">Invoice #<span id="invoice-id"></span></div>
                </header>
                <!-- Card body -->
                <div class="bg-gray-100 text-center px-5 py-6">
                    <div class="mb-6">€<span class="subtitle" style="color: black;" id="total-price"></span> In data <span id="checkout-date"></span></div>
                    <div class="space-y-3">
                        <div class="flex shadow-sm rounded">
                            <div class="flex-grow">
                                <input name="card-nr" class="text-sm text-gray-800 bg-white rounded-l leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" maxlength="16" placeholder="Numero della carta" aria-label="Numero della carta" />
                            </div>
                            <div class="flex-none w-[4.8rem]">
                                <input name="card-expiry" class="text-sm text-gray-800 bg-white leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="MM/YY" maxlength="5" aria-label="Data di scadenza" />
                            </div>
                            <div class="flex-none w-[3.5rem]">
                                <input name="card-cvc" class="text-sm text-gray-800 bg-white rounded-r leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" maxlength="3" type="text" placeholder="CVC" aria-label="CVC" />
                            </div>
                        </div>
                        <button id="checkout-button" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Paga</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const cartId = {{ $cartId }};
</script>
<script src="{{ url('assets/js/checkout/checkout.js') }}" type="text/javascript"></script>