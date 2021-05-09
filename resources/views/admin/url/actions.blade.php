<a href="{{ route('admin.url.edit', $url) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="edit">
    <i class="cil-description"></i>
</a>
<form action = "{{ route('admin.url.destroy', $url) }}" method = "post" id="url-{{ $url->id }}" class="action-delete" name="delete_item">
	@method('delete')
	@csrf
	<button type="submit" class="btn btn-sm btn-danger"><i class="cil-trash"></i></button> 
</form>