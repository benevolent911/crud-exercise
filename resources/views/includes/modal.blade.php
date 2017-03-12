<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h2 class="modal-title text-center text-danger" id="myModalLabel"><span class="glyphicon glyphicon-book"></span> Delete Book</h2>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this book?</p>
			</div>
			<div class="modal-footer">
				<form method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}                           
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
					<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>