<form {{ $attributes }}>
    @csrf
    @method('delete')
    <button type="submit" class="px-3 py-1 bg-red-500 hover:bg-red-600 rounded shadow text-white border-none text-xs"
        onclick="return confirm('hapus data ?')">Hapus</button>
</form>
