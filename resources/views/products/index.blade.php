<div class="relative overflow-x-auto pb-10">
    <table class="w-full text-sm text-left text-gray-500 shadow">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    DESCRIPTION
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $product->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->description }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
