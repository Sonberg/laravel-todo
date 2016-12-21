@extends('master')
@section('content')
@if($errors->has('text'))
 <div class="error">
   Du måste ha minst 5 tecken
 </div>
@endif
<form method="post"  action="/store">
  {{ csrf_field() }}
  <div class="form-group flex">
    <input type="text" id="add" name="text" value="{{ old('text')}}" class="form-control" placeholder="Vad behöver du göra?">
    <button type="submit" class="btn btn-default">Spara</button>
  </div>
</form>

<div class="container-fluid">
  <div class="row">
      @foreach ($items as $item)
        <div class="col-m-12 field">
          <div class="box"><input type="checkbox" id="{{ $item->id }}" /></div>
          <div class="name"><label for="{{ $item->id }}">{{ $item->text }}</label></div>
          <div class="date">{{ $item->created_at->diffForHumans() }}</div>
        </div>
      @endforeach
  </div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
    $( "#add" ).focus();
  });

  $(document).on("click", "input[type=checkbox]", function(e) {
    if(e.target.checked) {
      var id = e.target.id;
      if (id) {
        $.ajax({
          method: "GET",
          url: "/" + id + "/destroy"
        });
        $(e.target).parents(".field").slideUp(300, function() {
          $(e.target).parents(".field").remove();
          $("#add").focus();
        });
      }
    }
  })
</script>
@stop