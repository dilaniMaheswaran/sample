@include('inc.header')

@if(session('info'))
<div class="alert alert-success">
	{{session('info')}}
	</div>
@endif
    <table class="table table-striped table-hover">
      <thead>
<tr>
<th>ID</th>
<th>Post Title</th>
<th>Post Description</th>
<th>Action</th>

	</tr>
	</thead>
	<tbody>
	@if(count($articles) > 0)
	@foreach($articles->all() as $article)
	<tr>
	
<td>{{ $article->id }}</td>
<td>{{ $article->title }}</td>
<td>{{ $article->description }}</td>
<td>
<a href='{{ url("/read/{$article->id}") }}' class="read" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="read">&#xE86D;</i></a>

<a href='{{ url("/update/{$article->id}") }}' class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

<a href='{{ url("/delete/{$article->id}") }}' class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
</td>
        </tr>
        @endforeach
       @endif
        
      </tbody>
    </table>
  </div>
</div>
<!-- Edit Modal HTML -->
@include('inc.footer')