<div class="modal fade modal-dialog-center" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrap">
            <div class="modal-content">
                <form method="post" action="{{$action}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">@lang('base.delete confirm',['model'=>__($model)])</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div>@lang('base.delete confirm',['model'=>__($model)])<span id="model-body-text"></span></div>
                        <input name="id" id="id" hidden/>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">@lang('base.close')</button>
                        <button class="btn btn-warning" type="submit" id="confirmBtn"> @lang('base.confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
			var confirmBtnClick = 0;
			$('#confirmBtn').click(function () {
				if (confirmBtnClick >= 1) {
					$('#confirmBtn').attr('disabled', true)
				}
				confirmBtnClick++;
			})

			function deleteData(id, text) {
				console.log(id, text)
				$('#model-body-text').html(text);
				$('#id').val(id);
			}
    </script>
@endpush

