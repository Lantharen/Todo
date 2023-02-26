<form action="{{ route('todo.toggle-status') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">
    <input type="hidden" name="status" value="{{ $status ? '0' : '1' }}">
    <button type="submit" class="btn {{ $status ? 'btn-outline-warning' : 'btn-outline-success' }}">
        {{ $status ? 'Re-open' : 'Done' }}
    </button>
</form>
