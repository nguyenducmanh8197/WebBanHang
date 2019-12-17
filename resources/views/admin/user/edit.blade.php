@extends('admin.layout.master')
@section('content')
  <div class="main-content">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                     <div class="col-lg-7">
                         <div class="card">
                             <div class="card-header">
                                 <h2 class="title-1">Cập nhật tài khoản</h2>
                             </div>
                             <div class="card-body">
                                 <form action="{{ route('user.update',$user->id) }}" method="POST" id="save-user-form">
                                     {{ csrf_field() }}
                                     <div class="form-group has-success">
                                         <label for="" class="control-label mb-1">Tên:</label>
                                         <input type="text" class="form-control cc-name valid" name="name" value="{{$user->name}}" placeholder="Must be 8-20 characters long....." >
                                     </div>
                                     @if ( count($errors) > 0)
                                         <span style="color:red">{{$errors->first('name')}}</span>
                                     @endif
                                     <div class="form-group has-success">
                                         <label for="" class="control-label mb-1">Email:</label>
                                         <input type="text"  class="form-control cc-name valid" name="email" placeholder="Please enter valid email" value="{{$user->email}}">
                                     </div>
                                     @if ( count($errors) > 0)
                                         <span style="color:red">{{$errors->first('email')}}</span>
                                     @endif
                                     <div>
                                         <button class="btn btn-lg btn-info btn-block" type="submit"><i class="fa fa-edit">&nbsp;Sửa</i></button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                  </div>
              </div>
          </div>
      </div>

  </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#save-user-form').validate({
                errorClass: 'error-validate',
                rules: {
                    name: {
                        required: true,
                        minlength: 8,
                        maxlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    name: {
                        required: "Tên không được để trống.",
                        minlength: "Nhập tối thiểu 8 ký tự.",
                        maxlength: "Nhập tối đa 20 ký tự."
                    },
                    email: {
                        required: "Email không được để trống.",
                        email: "Không đúng định dạng email."
                    },
                }
            });
        });
    </script>
@endsection