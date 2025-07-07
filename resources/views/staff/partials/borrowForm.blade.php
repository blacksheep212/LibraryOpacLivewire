<form id="borrow-form" method="POST" action="{{ route('staff.processBorrow') }}" class="space-y-4">
    @csrf
    <div class="pt-4 flex">
        <button type="submit" class="bg-usepmaroon text-white px-6 py-2 rounded hover:bg-red-900">
            <i class="fas fa-barcode mr-2"></i>Scan
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium text-sm text-gray-700">Accession Number</label>
            <input type="text" name="accession_number" class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('accession_number') }}" required>
            @error('accession_number')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700">Borrower's ID</label>
            <input type="text" name="borrower_id" class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('borrower_id') }}" required>
            @error('borrower_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Keep all other fields exactly as they were, just add name attributes -->
        <div>
            <label class="block font-medium text-sm text-gray-700">Title</label>
            <input type="text" name="title" placeholder="Title"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('title') }}">
        </div>

        <!-- Add similar name attributes to all other inputs -->
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium text-sm text-gray-700">Date Borrowed</label>
            <input type="date" name="date_borrowed" class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('date_borrowed', now()->format('Y-m-d')) }}">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Due Date</label>
            <input type="date" name="due_date" class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('due_date', now()->addDays(14)->format('Y-m-d')) }}">
        </div>
    </div>
</form>
