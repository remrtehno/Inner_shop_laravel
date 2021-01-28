@extends("admin.main.main")

@section("content")

<style>
  .badge {
    background: red;
  }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <h1>
               Образцы
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <form action="{{route('samples.store')}}" method="post">
            @csrf

                <div class="form-group">
                        <button type="submit"class="btn btn-success">Сохранить</button>
                    </div>
            <div>


               <table class="table table-bordered table-striped DataTable">
                       <thead>
                         <tr>
                            <th>Артикул</th>
                            <th>Магазин</th>

                        </tr>
                       </thead>

                       <tbody>
                         @foreach($items as $key => $item)

                          <tr>
                            <td>{{$item->article}}

                            </td>
                            <td>

                              @foreach($shops as $key => $val)
                              <label>
                              <input type="checkbox"
                                <?php 
                              
                                foreach ($samples as $key => $sample) {

                                  $exp = explode(',', $sample->shop_id);

                                  if($item->id == $sample->product_id) {
                                    foreach ($exp as $key => $value) {

                                      if($val->id == $value){
                                        echo "checked";
                                      }
                                    }
                                  }
                                }

                                 ?>
                                  name="shop_id[{{$item->id}}][]" value="{{$val->id}}">

                                {{$val->title}}
                                </label>
                              @endforeach
                              <input type="hidden" name="shop_id[{{$item->id}}][]" value="-1" >
                            </td>
                          </tr>
                         @endforeach
                       </tbody> 


                     </table>
                





                
                 
              </div>

            </div>

</form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script>


  setInterval(function(){ 
    window.location.reload();
   }, 20000);


  window.onload = function() {


    var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/assets/exclamation.mp3');
        audioElement.setAttribute('preload', 'auto');
        //audioElement.setAttribute('onended', 'window.location.reload()');


    function playAudio() {
        audioElement.load;
        audioElement.play();
    };

    if(document.querySelector('.nav-tabs .badge')) {

      playAudio();
    }

  };


</script>
@endsection