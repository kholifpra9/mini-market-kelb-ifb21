<x-modal name="edit-qty" focusable maxWidth="2xl">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                <div class="py-3 px-4">
                </div>
                <div class="overflow-hidden">
                    <div class="max-w-xl">
                        <x-input-label for="qty" value="Edit Qty" />
                        <x-text-input id="qty" type="number" name="qty" class="mt-1 block w-full"
                            value="" required />
                        <x-input-error class="mt-2" :messages="$errors->get('qty')" />
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </x-modal>