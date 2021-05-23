@extends('layouts.app')
@section('additional-links')
<link rel="stylesheet" href="{{asset('css/richtext.min.css')}}">
@endsection
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h3 class="font-weight-bold h3 text-center text-dark">Mark a date within the term as important.</h3>
			
				<div class="row justify-content-center">
					<div class="col-md-12">
						@foreach($terms as $term)
						<h4 class="text-center text-dark font-weight-bold h4">Event within {{ $term->termname}}</h4>
						<form action="/TermEvents/{{ $term->id}}" method="POST">
							@csrf
							<div class="form-group row">
								<label for="" class="col-md-4 label">Event Date</label>
								<div class="col-md-8">
									<input type="date" name="eventdate" class="form-control @error('eventdate')is-invalid @enderror" value="{{ old('eventdate')}}" min="{{$term->startdate}}" max="{{$term->enddate}}" required>
									@error('eventdate')
										<span class="alert alert-danger">{{$message}}</span>
									@enderror
									<input type="hidden" name="today" value="<?php echo date('Y/m/d') ?>">
									<input type="hidden" name="last_term_date" value="{{$term->enddate}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-md-4 col-form-label">Description</label>
								<div class="col-md-8">
									<textarea name="description"  class="form-control content" rows="10">
										{{old('description')}}
									</textarea>
									@error('description')
										<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>

							<div class="form-group row justify-content-center">
								<button class="btn btn-block btn-outline-info" type="submit">Save Term Date</button>
							</div>
												
						</form>
						<hr>
						@endforeach
					</div>					
				</div>
				<div class="row justify-content-center">
					<div class="col-md-8">
						{{$terms->links()}}
					</div>
				</div>
			
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script src="{{asset('js/jquery.richtext.min.js')}}"></script>
<script>
	$('.content').richText({
  // text formatting
  bold: true,
  italic: true,
  underline: true,

  // text alignment
  leftAlign: true,
  centerAlign: true,
  rightAlign: true,

  // lists
  ol: true,
  ul: true,

  // title
  heading: true,

  // fonts
  fonts: true,
  fontList: ["Arial", 
    "Arial Black", 
    "Comic Sans MS", 
    "Courier New", 
    "Geneva", 
    "Georgia", 
    "Helvetica", 
    "Impact", 
    "Lucida Console", 
    "Tahoma", 
    "Times New Roman",
    "Verdana"
    ],
  fontColor: true,
  fontSize: true,

  // uploads
  imageUpload: true,
  fileUpload: true,

  // media
  videoEmbed: true,

  // link
  urls: true,

  // tables
  table: true,

  // code
  removeStyles: true,
  code: true,

  // colors
  colors: [],

  // dropdowns
  fileHTML: '',
  imageHTML: '',

  // translations
  translations: {
    'title': 'Title',
    'white': 'White',
    'black': 'Black',
    'brown': 'Brown',
    'beige': 'Beige',
    'darkBlue': 'Dark Blue',
    'blue': 'Blue',
    'lightBlue': 'Light Blue',
    'darkRed': 'Dark Red',
    'red': 'Red',
    'darkGreen': 'Dark Green',
    'green': 'Green',
    'purple': 'Purple',
    'darkTurquois': 'Dark Turquois',
    'turquois': 'Turquois',
    'darkOrange': 'Dark Orange',
    'orange': 'Orange',
    'yellow': 'Yellow',
    'imageURL': 'Image URL',
    'fileURL': 'File URL',
    'linkText': 'Link text',
    'url': 'URL',
    'size': 'Size',
    'responsive': 'Responsive',
    'text': 'Text',
    'openIn': 'Open in',
    'sameTab': 'Same tab',
    'newTab': 'New tab',
    'align': 'Align',
    'left': 'Left',
    'center': 'Center',
    'right': 'Right',
    'rows': 'Rows',
    'columns': 'Columns',
    'add': 'Add',
    'pleaseEnterURL': 'Please enter an URL',
    'videoURLnotSupported': 'Video URL not supported',
    'pleaseSelectImage': 'Please select an image',
    'pleaseSelectFile': 'Please select a file',
    'bold': 'Bold',
    'italic': 'Italic',
    'underline': 'Underline',
    'alignLeft': 'Align left',
    'alignCenter': 'Align centered',
    'alignRight': 'Align right',
    'addOrderedList': 'Add ordered list',
    'addUnorderedList': 'Add unordered list',
    'addHeading': 'Add Heading/title',
    'addFont': 'Add font',
    'addFontColor': 'Add font color',
    'addFontSize' : 'Add font size',
    'addImage': 'Add image',
    'addVideo': 'Add video',
    'addFile': 'Add file',
    'addURL': 'Add URL',
    'addTable': 'Add table',
    'removeStyles': 'Remove styles',
    'code': 'Show HTML code',
    'undo': 'Undo',
    'redo': 'Redo',
    'close': 'Close'
  },

  // dev settings
  useSingleQuotes: false,
  height: 0,
  heightPercentage: 0,
  id: "",
  class: "",
  useParagraph: false
  
});
</script>
@endsection