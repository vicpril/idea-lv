@extends('back.layout')

@section('css')
    <style>
        textarea { resize: vertical; }
    </style>
    <!-- Colorbox -->
    <link href="{{ asset('adminlte/plugins/colorbox/colorbox.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('adminlte/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('adminlte/plugins/iCheck/all.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('adminlte/plugins/datepicker/datepicker3.css') }}" rel="stylesheet">
   
@endsection

@section('main')

    @yield('form-open')
        {{ csrf_field() }}

        <div class="row">
            <!-- MAIN PART -->
            <div class="col-md-9">
                @if (session('post-ok'))
                    @component('back.components.alert')
                        @slot('type')
                            success
                        @endslot
                        {!! session('post-ok') !!}
                    @endcomponent
                @endif
                
                <!-- Title -->
                @component('back.components.box')
                   @slot('type')
                        box-primary
                    @endslot
                    @slot('boxTitle')
                        @lang('Title')
                    @endslot
                    <label for="title-ru" class="">Русское:</label>
                    @include('back.partials.input',[
                        'input' => [
                                    'name' => 'title-ru',
                                    'value' => isset($article) ? $article->ru->title : '',
                                    'input' => 'text',
                                    'required' => true,
                                ]
                    ])
                    <label for="title-en" class="">Английское:</label>
                    @include('back.partials.input',[
                        'input' => [
                                    'name' => 'title-en',
                                    'value' => isset($article) ? $article->en->title : '',
                                    'input' => 'text',
                                    'required' => true,
                                ]
                    ])
                @endcomponent
              
              <!-- Authors -->
                @component('back.components.box')
                   @slot('type')
                        box-primary
                    @endslot
                    @slot('boxTitle')
                        @lang('Authors')
                    @endslot
                    @include('back.partials.input',[
                        'input' => [
                                    'name' => 'users',
                                    'values' => isset($article) ? $article->users : collect(),
                                    'input' => 'authors',
                                    'options' => $users,
                                    'required' => true,
                                ]
                    ])
                @endcomponent
              
              
              
                  <!-- UDK -->
                    @include('back.partials.boxinput', [
                          'box' => [
                              'type' => 'box-primary',
                              'title' => __('UDK'),
                          ],
                          'input' => [
                              'name' => 'udk',
                              'value' => isset($article) ? $article->udk : '',
                              'input' => 'text',
                              'required' => false,
                          ],
                      ])
              
                   <!-- Аннотация РУС -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Annotation').' (рус)',
                        ],
                        'input' => [
                            'name' => 'annotation-ru',
                            'value' => isset($article) ? $article->ru->annotation : '',
                            'input' => 'textarea',
                            'rows' => 3,
                            'required' => false,
                        ],
                    ])
              
              <!-- DOI -->
                    @include('back.partials.boxinput', [
                          'box' => [
                              'type' => 'box-primary',
                              'title' => __('DOI'),
                          ],
                          'input' => [
                              'name' => 'doi',
                              'value' => isset($article) ? $article->doi : '',
                              'input' => 'text',
                              'required' => false,
                          ],
                      ])
              
               <!-- Keywords РУ -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Keywords').' (рус)',
                        ],
                        'input' => [
                            'name' => 'keywords-ru',
                            'value' => isset($article) ? $article->ru->keywords : '',
                            'input' => 'textarea',
                            'rows' => 2,
                            'required' => false,
                        ],
                    ])
              
              <!-- Date arrival -->
                @component('back.components.box')
                    @slot('type')
                        box-primary
                    @endslot
                    @slot('boxTitle')
                        @lang('Dates')
                    @endslot
                    <label for="date-arrival">@lang('Date arrival'):</label>
                    @include('back.partials.input',[
                        'input' => [
                                    'name' => 'date-arrival',
                                    'value' => isset($article) ? $article->date_arrival : '',
                                    'input' => 'datepicker',
                                    'required' => false,
                                ]
                    ])
                    <label for="date-review">@lang('Date review'):</label>
                    @include('back.partials.input',[
                        'input' => [
                                    'name' => 'date-review',
                                    'value' => isset($article) ? $article->date_review : '',
                                    'input' => 'datepicker',
                                    'required' => false,
                                ]
                    ])
                    
                  @endcomponent
              
              <!-- Приложения -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Aplications'),
                        ],
                        'input' => [
                            'name' => 'aplications',
                            'value' => isset($article) ? $article->ru->aplications : '',
                            'input' => 'textarea',
                            'rows' => 3,
                            'required' => false,
                        ],
                    ])
              
                    <!-- Аннотация ENG -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Annotation').' (eng)',
                        ],
                        'input' => [
                            'name' => 'annotation-en',
                            'value' => isset($article) ? $article->en->annotation : '',
                            'input' => 'textarea',
                            'rows' => 3,
                            'required' => false,
                        ],
                    ])
              
               <!-- Keywords ENG -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Keywords').' (eng)',
                        ],
                        'input' => [
                            'name' => 'keywords-en',
                            'value' => isset($article) ? $article->en->keywords : '',
                            'input' => 'textarea',
                            'rows' => 2,
                            'required' => false,
                        ],
                    ])
              
              <!-- Financial INFO -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Financial info'),
                        ],
                        'input' => [
                            'name' => 'financial',
                            'value' => isset($article) ? $article->financial : '',
                            'input' => 'textarea',
                            'rows' => 2,
                            'required' => false,
                        ],
                    ])
              
               <!-- Литература RUS -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Bibliography').' (рус)',
                        ],
                        'input' => [
                            'name' => 'bibliography-ru',
                            'value' => isset($article) ? $article->ru->bibliography : '',
                            'input' => 'textarea',
                            'rows' => 3,
                            'required' => false,
                        ],
                    ])
              
              
                <!-- Литература ENG -->
              
                    @include('back.partials.boxinput', [
                        'box' => [
                            'type' => 'box-primary',
                            'title' => __('Bibliography').' (eng)',
                        ],
                        'input' => [
                            'name' => 'bibliography-en',
                            'value' => isset($article) ? $article->en->bibliography : '',
                            'input' => 'textarea',
                            'rows' => 3,
                            'required' => false,
                        ],
                    ])
              
              
              
            
                <button type="submit" class="btn btn-primary">@lang('Submit')</button>
            </div>
          
          
          
          
            <!-- RIGHT SIDEBAR PART -->
            <div class="col-md-3">
         
                <!-- Status -->
                @component('back.components.box')
                    @slot('type')
                        @if (isset($article))
                            @if ($article->status->name === 'public')
                                box-solid box-success
                            @else
                                box-solid box-danger
                            @endif
                        @else
                            box-info
                        @endif
                    @endslot
                    @slot('boxTitle')
                        @lang('Status')
                    @endslot
                    
                    <!-- <label for="Status">Status</label> -->
                    @include('back.partials.input', [
                            'input' => [
                                    'name' => 'status',
                                    'values' => isset($article) ? $article->status->id : collect(),
                                    'input' => 'select',
                                    'options' => [
                                                    2 => 'Черновик',
                                                    1 => 'Опубликован',
                                                    ],
                                ],
                        ])
                    @if (isset($article))
                        <div><span id="timestamp">'Дата обновления:'<b>$article->updated_at</b></span></div>
                    @endif

                    @slot('footer')
                        @if (isset($article))
                            <button type="delete" class="btn btn-default pull-left" style="color: red;">@lang('Delete')</button>
                            <button type="submit" class="btn btn-primary pull-right">@lang('Save')</button>
                        @else
                            <button type="submit" class="btn btn-default pull-left" >@lang('Save')</button>
                            <button type="public" class="btn btn-primary pull-right">@lang('Submit')</button>
                        @endif   
                    @endslot
                @endcomponent

                <!-- Issue -->
                @component('back.components.box')
                    @slot('type')
                        box-info
                    @endslot
                    @slot('boxTitle')
                        @lang('Issue')
                    @endslot
                        <div>
                          <div class="col-sm-3">
                            <label for="year" class="">@lang('Year'):</label>
                          </div>
                          <div class="col-sm-9">
                            @include('back.partials.input',[
                                'input' => [
                                    'name' => 'year',
                                    'value' => isset($article) ? $article->issue->year : '',
                                    'input' => 'text',
                                    'required' => true,
                                    
                                ]
                            ]) 
                          </div>
                        </div>
                        <div>
                          <div class="col-sm-3">
                            <label for="no" class="">@lang('No'):</label>
                          </div>
                          <div class="col-sm-9">
                            @include('back.partials.input',[
                                'input' => [
                                    'name' => 'no',
                                    'values' => isset($article) ? $article->issue->no : collect(),
                                    'input' => 'select',
                                    'options' => [1=>1, 2=>2, 3=>3, 4=>4],
                                    'required' => true,
                                ]
                            ])
                            </div>
                        </div>
                      <div>
                          <div class="col-sm-3">
                            <label for="no" class="">@lang('Part'):</label>
                          </div>
                          <div class="col-sm-9">
                            @include('back.partials.input',[
                                'input' => [
                                    'name' => 'tom',
                                    'values' => isset($article) ? $article->issue->tom : collect(),
                                    'input' => 'select',
                                    'options' => [1=>1, 2=>2],
                                    'required' => true,
                                ]
                            ])
                            </div>
                        </div>
                      <div class="col-sm-12">
                            @include('back.partials.input',[
                                'input' => [
                                    'label' => 'Эта записть отностится к круглому столу',
                                    'name' => 'stol',
                                    'value' => isset($article) ? $article->stol : '',
                                    'input' => 'checkbox',
                                    'class' => '',
                                ]
                            ])
                        </div>
              
                @endcomponent
              
                <!-- Category -->
                @component('back.components.box')
                    @slot('type')
                        box-warning
                    @endslot
                    @slot('boxTitle')
                        @lang('Category')
                    @endslot
                    @include('back.partials.input', [
                        'input' => [
                            'name' => 'category[]',
                            'values' => isset($article) ? $article->categories : collect(),
                            'input' => 'categories',
                            'options' => $categories,
                        ],
                    ])
                @endcomponent
         
                <!-- Tags -->
                @component('back.components.box')
                    @slot('type')
                        box-warning
                    @endslot
                    @slot('boxTitle')
                        @lang('Tags')
                    @endslot
                    @include('back.partials.input', [
                        'input' => [
                            'name' => 'tags',
                            'values' => isset($article) ? $article->tags : collect(),
                            'input' => 'tags',
                            'options' => $tags,
                        ],
                    ])
                @endcomponent

        </div>
        </div>
    </form>

@endsection

@section('js')

    <script src="{{ asset('adminlte/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/voca/voca.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
<!--     <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>  -->
    <script src="{{ asset('adminlte/plugins/ckeditor/ckeditor.js') }}"></script> 
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    
    <script>
      //<!-- Flat red color scheme for iCheck
      $('input[type="checkbox"].icheckbox_flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
      });

      
      //Initialize Select2 Elements
       $('.select2').select2();
      
        $("select").on("select2:select", function (evt) {
          var element = evt.params.data.element;
          var $element = $(element);

          $element.detach();
          $(this).append($element);
          $(this).trigger("change");
        });

      //CKEDITOR
      CKEDITOR.replace('annotation-ru', {customConfig: '/adminlte/js/ckeditor.js'})
      CKEDITOR.replace('annotation-en', {customConfig: '/adminlte/js/ckeditor.js'})
      CKEDITOR.replace('aplications', {customConfig: '/adminlte/js/ckeditor.js'})
      CKEDITOR.replace('bibliography-ru', {customConfig: '/adminlte/js/ckeditor.js'})
      CKEDITOR.replace('bibliography-en', {customConfig: '/adminlte/js/ckeditor.js'})

        $('.popup_selector').click( function (event) {
            event.preventDefault()
            var updateID = $(this).attr('data-inputid')
            var elfinderUrl = '/elfinder/popup/'
            var triggerUrl = elfinderUrl + updateID
            $.colorbox({
                href: triggerUrl,
                fastIframe: true,
                iframe: true,
                width: '70%',
                height: '70%'
            })
        })

        function processSelectedFile(filePath, requestingField) {
            $('#' + requestingField).val('\\' + filePath)
            $('#img').attr('src', '\\' + filePath)
        }

        $('#slug').keyup(function () {
            $(this).val(v.slugify($(this).val()))
        })

        $('#title').keyup(function () {
            $('#slug').val(v.slugify($(this).val()))
        })
      
      //Date picker
        $('.datepicker').datepicker({
          autoclose: true,
          language: 'ru-RU',
          weekStart: 1,
        })

    </script>

@endsection