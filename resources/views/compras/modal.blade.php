<div class="modal fade" id="modal-delete-{{$c->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header" style="background: #1bdbe0; border-color: #1bdbe0">
				<h2 class="modal-title" id="myLargeModalLabel" style="color: #fff">Anular Compras</h2>
			</div>
			<div class="modal-body">
				<form  action="{{route('compras.destroy', $c->id)}}" method="POST">
					@method('DELETE')
					@csrf
					<p><h3>¿Desea anular esta orden de Compra?</h3></p>
					<div class="modal-footer">
						<button class="btn btn-primary btn-icon-text" type="submit" id="guardar">Aceptar <i class="icon-check btn-icon-prepend"></i></button>
						<button class="btn btn-danger btn-icon-text" type="button" data-dismiss="modal">Cancelar <i class="icon-close btn-icon-prepend"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

