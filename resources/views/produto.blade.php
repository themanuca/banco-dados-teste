
@extends('layouts.app')

@section('content')

    <div class="container">
        <form  method="POST" enctype="multipart/form-data" action="{{route('cadproduto')}}">
            @csrf

            <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Arquivo</label>
            <input type="name" name='nome' class="form-control" id="exampleFormControlInput1" placeholder="Nome">
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Categoria do produto</label>

            <select class="form-control" id="exampleFormControlSelect1" name='categoria_id'>
                
                
                <option class='ds' value="1">1</option>
                <option class='ds' value="2">2</option>
                <option class='ds' value="3">3</option>
                
            </select>
            </div>
            
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='textoarea'></textarea>
            </div>
            <label for="formFileDisabled" class="form-label">Disabled file input example</label>
            <input class="form-control" type="file" id="formFileDisabled" name='file_path' />
            <br>
            
               
            <button type="submit" class="btn btn-primary">
                {{ __('cadproduto') }}
            </button>
            
            
        
        </form> 
    </div>    

@endsection