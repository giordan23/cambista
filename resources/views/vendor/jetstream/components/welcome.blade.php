<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl text-gray-700 font-extrabold">
        Modificar precios
    </div>
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-12 px-2 mx-4">
                                <div class="col-span-6 sm:col-span-3">
                                    <p class="font-bold text-green-600 text-lg">Precio actual de COMPRA: </p>
                                    <label for="first-name" class="font-bold text-gray-700 text-md">Precio origen: </label>
                                    <input wire:model="alter_compra" type="text" name="first-name" id="first-name"
                                        placeholder="1.02 || 0.98" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <p class="text-green-700 my-3 font-semibold">El nuevo precio de compra será:</p>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <p class="font-bold text-red-600 text-lg">Precio actual de VENTA: </p>
                                    <label for="last-name" class="font-bold text-gray-700 text-md">Precio origen:</label>
                                    <input wire:model="alter_venta" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    placeholder="1.02 || 0.98" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <p class="text-red-500 font-semibold my-3">El nuevo precio de venta será:</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardasdar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

</div>
