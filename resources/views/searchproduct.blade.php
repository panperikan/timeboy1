<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<ul class="nav justify-content-center bg-light">
  <li class="nav-item">
    <a class="nav-link active link-dark" aria-current="page" href="{{route('home')}}">ホーム</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-dark" href="/time">タイムボーイ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-dark" href="/communication">連絡掲示板</a>
  </li>
  </ul>
<main>
  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">勤務検索画面</h2>
      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
          <form method="GET" action="{{ route('searchproduct')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">日時</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="month" class="form-control" name="searchWord" value="{{ $searchWord }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">スタッフ名</label>
              <div class="col-sm-3">
                <select name="userId" class="form-control" value="{{ $userId }}">
                  <option value="">未選択</option>

                  @foreach($users as $id => $name)
                  <option value="{{ $id }}">
                    {{ $name }}
                  </option>  
                  @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($products))
    <div class="productTable">
      <p>全{{ $products->count() }}件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th style="width:50%">勤務時間</th>
            <th>スタッフ名</th>
            <th>勤務時間</th>
            <th>年　月　日</th>
            <th></th>
          </tr>
        </thead>
        
        @foreach($products as $product)
        {{-- @if($product->workTime == NULL)
          @else --}}
        <tr>
          <td>{{ $product->punchIn }}～{{ $product->punchOut }}</td>
          <td>{{ $product->user->name }}</td>
          
          <td>{{ $product->workTime }}時間</td>
          
          <td>{{ $product->year }}年{{ $product->month }}月{{ $product->day }}日</td>
          <td><a href="{{route('report.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm">詳細</a></td>
          
        </tr>
       {{--  @endif --}}
        @endforeach
        
        <div class="alert alert-success" role="alert">
          累計時間：{{$total}}時間
        </div>
        
      </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{-- appendsでカテゴリを選択したまま遷移 --}}
      {{ $products->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
  </div>
</main>