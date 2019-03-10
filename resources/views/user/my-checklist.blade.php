@extends('layouts.app')

@push('css')

@endpush

@section('content')
  <!-- Masthead -->
  <header class="pagehead" style="background-image: url({{asset('img/backgrounds/bg-footer.jpg')}});">
    <div class="container">
      <div class="row">
        <div class="col-12 my-auto text-center text-white">
          <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}" alt="">
        </div>
      </div>
    </div>
  </header>

  <!-- My Checklist Section -->
  <section class="page-section mt-3 mb-3">
    <div class="container">

      <div class="row">
        <ul class="breadcrumb">
          <li><a href="{{route('mainhome')}}">Home</a></li>
          <li><a href="{{route('my-account')}}">My Account</a></li>
          <li class="active"> My Checklist</li>
        </ul>
      </div>

      <div class="wow fadeIn text-center">
        <h3>My Checklist</h3>
        <hr class="colored">
      </div>

      {{-- <div class="col-lg-12 mt-4" style="text-align: justify;">
      <p>A planning tool designed to make your event preparation more efficient. Use our preset of checklists or add your own set of tasks with corresponding dates to the existing checklist. You can access and edit our checklist anytime either from our app or our website.</p>
    </div> --}}

    <div class="col-lg-12 mt-4" style="text-align: justify;">
      <p>
        This planning tool is designed to keep everything on track in your wedding events (Mehedi, Holud, Wedding). Using this tool, you will hardly miss anything for your wedding. Here, you will find the required tasks for all events under one segment. We have tried to enlist every small and major tasks required in your wedding with a suggested reminding period which you can add, remove, and change or customize according to your own preference. So, enjoy the tool and plan your wedding your way.
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Things to do first (must done 8-6 months beforehand)</h5>

        <ul style="list-style: none;">
          {!! Form::open() !!}
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i> Fix your event dates and Create respective guest list. (8 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i> Talk to partner and parents about budget of wedding (8 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i> Check if you can contribute from your own savings (8 months)  </li>
          {!! Form::close() !!}
          @foreach ($datas as $data)
            @if ($data->section == 1)
              <li>
                <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                {!! Form::close()!!}
              </li>
            @endif
          @endforeach
        </ul>
        {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
        <div class="input-group mb-3">
          <input type="hidden" name="section" value="1">
          <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist" required>
          <div class="input-group-append">
            {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
          </div>
        </div>
        {!! Form::close()!!}
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Venue (8-6 months before)</h5>
        <ul style="list-style: none;">
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to partner and family whether it is going to be a joint Holud ceremony or separate. (8 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Look up wedding and holud venues within your price range and convenience of commuting from your home while keeping in mind the no. of guests that will attend. (7 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Finalize selection of event venue and complete advance payment of the venue. (6 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Visit venue for reassuring everything. (15days) </li>
          @foreach ($datas as $data)
            @if ($data->section == 2)
              <li>
                <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                {!! Form::close()!!}
              </li>
            @endif
          @endforeach
        </ul>
        {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
        <div class="input-group mb-3">
          <input type="hidden" name="section" value="2">
          <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
          <div class="input-group-append">
            {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
          </div>
        </div>
        {!! Form::close()!!}
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Decoration (5 months beforehand)</h5>
        <ul style="list-style: none;">
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Research online for different types of wedding theme and Select a theme that you find best (4 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   If holud is held indoors, Research online for various indoor themed holud events. (4 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to relatives and friends regarding bride-groom entry theme (4 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Plan your decoration idea whether you are going to hire an event management or do it by yourself. (3 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Discuss theme with event management or your decoration team (2 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select & book florists to decorate home and car (2 weeks) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Send someone at the venue on event day to assure the details of decoration. </li>
          @foreach ($datas as $data)
            @if ($data->section == 3)
              <li>
                <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                {!! Form::close()!!}
              </li>
            @endif
          @endforeach
        </ul>
        {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
        <div class="input-group mb-3">
          <input type="hidden" name="section" value="3">
          <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
          <div class="input-group-append">
            {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
          </div>
        </div>
        {!! Form::close()!!}
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Clothing and accessories (at least 2-3 months before)</h5>
        <ul style="list-style: none;">
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Research about wedding and holud clothes through articles & social medias (3 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to friends & family and finalize your event dress matching with the theme of your wedding/holud (3 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Create budget for clothes to be bought. (3 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Make a list of Dresses for other days beside your wedding day. (2 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Create a list of clothes to be bought for relatives and in laws. (2 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to friends & family or research online from where to buy desired dresses (2 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Tailoring of clothes (at least one month before) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Check up with tailor for trial and fitting (at least 15 days before) </li>
          @foreach ($datas as $data)
            @if ($data->section == 5)
              <li>
                <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                {!! Form::close()!!}
              </li>
            @endif
          @endforeach
        </ul>
        {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
        <div class="input-group mb-3">
          <input type="hidden" name="section" value="5">
          <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
          <div class="input-group-append">
            {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
          </div>
        </div>
        {!! Form::close()!!}
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Jewelleries (2-3 months before)</h5>
        <ul style="list-style: none;">
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Create a budget for jewelleries (3 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Try to hunt down your treasure jewellery as a blessing from your elders if you are the bride. (3 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Research online and read articles about the types of jewelleries that are trending (3 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select jewelleries that matches your outfit and theme (2 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to friends and family about the best jewellery shops in the city (2 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Take someone with you who is good at judging authenticity of jewellery on your shopping day (1 month)  </li>
          @foreach ($datas as $data)
            @if ($data->section == 6)
              <li>
                <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                {!! Form::close()!!}
              </li>
            @endif
          @endforeach
        </ul>
        {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
        <div class="input-group mb-3">
          <input type="hidden" name="section" value="6">
          <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
          <div class="input-group-append">
            {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
          </div>
        </div>
        {!! Form::close()!!}
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Beauty and makeup (from 1 month before to the day of wedding)</h5>
        <ul style="list-style: none;">
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Read make up Ideas & Stories online or from Ayojok.com and decide a make-up theme which goes with your outfits & jewellery. (2 months)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Make a routine diet/gym to get your body into shape if you are the bride. (must be started at least 2 months before event)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Book beauty parlor that is closer to home and wedding venue (1 month before)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to makeup artist about the look you want (1 month before)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select a suitable haircut & facial treatment and make it done if you are the groom. (5-7 days before)  </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Start early for parlour or salon to get in as early as possible and finished at least 2 hrs before scheduled time of event.  </li>
          @foreach ($datas as $data)
            @if ($data->section == 7)
              <li>
                <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                {!! Form::close()!!}
              </li>
            @endif
          @endforeach
        </ul>
        {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
        <div class="input-group mb-3">
          <input type="hidden" name="section" value="7">
          <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
          <div class="input-group-append">
            {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
          </div>
        </div>
        {!! Form::close()!!}
      </p>
    </div>

    <div class="col-lg-12" style="text-align: justify;font-size:18px;">
      <p>
        <h5>Photography & Cinematography (6 months beforehand)</h5>
        <ul style="list-style: none;">
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Research photographers online and social media (6 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select and book photographer & cinematographer (4 months before) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Read the articles about the different types wedding photos that are unique, preferably from Ideas & Stories posted in Ayojok.com (4 months) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Discuss the theme and ask suggestions regarding decoration, lighting and make up with photographer (1 month) </li>
          <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Discuss About any preferred song for cinematic trailer (1 month) <li>
            @foreach ($datas as $data)
              @if ($data->section == 8)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="8">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Invitations (1-2 months before event)</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select invitation card design and number according to your event theme and guests. (2 months) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Double check the texts for card/order (2 months) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Send out or deliver invitation cards (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Create a facebook event page with your invited guests and give them a reminder. (7 days) </li>
            @foreach ($datas as $data)
              @if ($data->section == 9)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="9">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Food & Sweets</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select your food menu depending on day/night event. (2 months) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Appoint your preferred catering and discuss about the menu & guest number. (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Make a list of relatives and in laws to whom you will be distributing sweets and desserts (1 week before) </li>
            @foreach ($datas as $data)
              @if ($data->section == 10)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="10">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Music & Entertainment (2 month before)</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Create a list of people who will be able to perform in your dance practice. (2 months) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Search for bands/solo artists/DJ; personally, contact them for availability and book them for your Holud. (2 months) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Download finalized songs for dance performance and edit/cut each song down to required time limit (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Fix date, time and place for dance practice. (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Search on YouTube for various choreography on your selected songs or hire a professional dance choreographer. (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Book your required sound system & lighting. (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Discuss preferred songs with band/artist/DJ (15 days) </li>
            @foreach ($datas as $data)
              @if ($data->section == 11)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="11">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Officiant & Legal paperwork</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Find a Wedding Officiant (1 month before) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Talk to the officiant and gather necessary documents to file marriage license with partner (15 days before) </li>
            @foreach ($datas as $data)
              @if ($data->section == 12)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="12">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Trousseau (1 week before)</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Make a list of goodies that you will give as trousseau (1 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Packing gifts for wedding and Ask relatives and friends for help (2 days before) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Ensure a separate car to take the gifts to the venue (2 days before) </li>
            @foreach ($datas as $data)
              @if ($data->section == 13)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="13">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Accommodation & Transport (15 days before)</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Rent a car for bride/groom car if necessary. (2 weeks) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Rent cars for friends & family. (2 weeks) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Make a schedule for car decoration and hire someone accordingly. (groom side) (morning of the day of wedding) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Make sure decoration of car is done before scheduled time start for event at least 2 hours before time. </li>
            <li> <i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>  Book hotels/guest houses accordingly if you have guests from outside towns or you are planning to have a destination wedding. (1 month before) </li>
            @foreach ($datas as $data)
              @if ($data->section == 14)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="14">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      <div class="col-lg-12" style="text-align: justify; font-size:18px;">
        <p>
          <h5>Honeymoon & Travel (post wedding)</h5>
          <ul style="list-style: none;">
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Create a budget for honeymoon (2 month) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Research online or browse articles regarding honeymoon destinations and make a trip plan. (2 months) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Select honeymoon destination and fix travel date. (1 month before) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Search online for best tourism packages or Book hotels online via air bnb, tripadvisor etc yourself. (1 month before) </li>
            <li><i class="fa fa-check fa-1x" style="margin-right:1rem;color:#f47f20"></i>   Purchase plane tickets (1 month) </li>
            @foreach ($datas as $data)
              @if ($data->section == 15)
                <li>
                  <input type="checkbox" name="check" class="checkbox" data-listid ="{{$data->id}}" {{ $data->status ? 'checked' : '' }}> {{$data->details}}
                  {!! Form::open(['method' => 'POST','route'=> ['deleteChecklist',$data->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                </li>
              @endif
            @endforeach
          </ul>
          {!! Form::open(['method' => 'POST','route' =>'addNew' ,'style' => 'display:inline']) !!}
          <div class="input-group mb-3">
            <input type="hidden" name="section" value="15">
            <input type="text" name="details" class="form-control" placeholder="Add new to this checklist" aria-label="Add new to this checklist"   required>
            <div class="input-group-append">
              {!! Form::button('Add New',['class'=> 'btn btn-outline-secondary','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Click to add new']) !!}
            </div>
          </div>
          {!! Form::close()!!}
        </p>
      </div>

      {{-- <div class="col-lg-12" style="text-align: justify; font-size:18px;">

    </div> --}}
  </div>
</section>
@endsection

@push('scripts')
  <script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.checkbox').on('change',function (){
    var taskId = $(this).attr("data-listid"); // gets task ID of clicked checkbox
    //var state = $(this).is(':checked'); // gets if checkbox is checked or not
    var state = $(this).is(':checked') ? 1 : 0;
    //alert(state);
    $.ajax({
      data: {
        id: taskId,
        status: state,
      },
      url: '/my-checklist/checkChecklist/',
      type: 'POST',
      dataType: 'json'
    });
  });

  </script>
@endpush
