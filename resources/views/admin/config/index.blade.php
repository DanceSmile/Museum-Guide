@extends("layouts.admin")



@section("section")
<div class="main-container" >
    <div class="container-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-breadcrumb-wrap">

                        <div class="page-breadcrumb-info">
                            <h2 class="breadcrumb-titles">Dashboard <small>Web Application Backend</small></h2>
                            <ul class="list-page-breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li class="active-page"> Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="btn-group pull-right " style="margin-top:30px;">
                        <a  href='{{url('admin/exhibit/create')}}' type="button" class="btn btn-default"><i class="ico-plus"></i> Add New Goods</a>
                    </div>
                </div>
            </div>
        </div>



      <div class="row">



<div class="widget-container">
    <div class="widget-block">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered matmix-dt">
                <thead>
                    <tr>
                        <th colspan="7">
                            <div class="dt-col-header font">用户配置</div>
                            <p class="font">
                                您可以在这里配置你的程序的预设值，无需担心您的信息被盗取，我们将会一直为您保驾护航   --- 四月兄弟Aprbrother
                               
                            </p>
                        </th>
                        
                    </tr>
                    <tr>
                        <th class="tc-center font">
                            #
                        </th>
                        <th class="tc-center font">
                            配置名称
                        </th>
                        <th class="tc-center font">
                            配置值
                        </th>
                        <th class="tc-center font">
                            描述
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="tc-center font">
                            1
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="后台名称"/>
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信博物馆导览 - 四月兄弟Aprbrother"/>
                        </td>
                        <td class="tc-center font">
                           <input type="text" class="form-control" name="pname" placeholder="展览主题" value="后台网站名称"/>
                        </td>
                    </tr>

                    
                    <tr>
                        <td class="tc-center font">
                            2
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信appId"/>
                        </td>
                        <td class="tc-center font">
                           <input type="text" class="form-control" name="pname" placeholder="展览主题" value="f3b02f770b4036116ed634fd8a18ee7f"/>
                        </td>
                        <td class="tc-center font">
                           <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信公众号的appid"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="tc-center font">
                            3
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信screct"/>
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="rtyhjn8ujhnbijhb"/>
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信公众号的screct"/>
                        </td>
                   </tr>
                    <tr>
                        <td class="tc-center font">
                            4
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信支付目录"/>
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="user/payment"/>
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="微信支付目录"/>
                        </td>
                   </tr>
                   <tr>
                        <td class="tc-center font">
                            5
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="七牛云存储"/>
                        </td>
                        <td class="tc-center font">
                            <input type="text" class="form-control" name="pname" placeholder="展览主题" value="rtghnmkjnbghujh7i"/>
                        </td>
                        <td class="tc-center font">
                           <input type="text" class="form-control" name="pname" placeholder="展览主题" value="七牛云存储，为用户提供免费的网站加速服务"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="tc-center font">
                          
                        </td>
                        <td class="tc-center font">
                            
                        </td>
                        <td class="tc-center font">
                             
                        </td>
                        <td class="tc-center font">
                            <button type="button" class="btn btn-info btn-md">确认修改</button>
                        </td>
                   </tr>
                           
                </tbody>
            </table>
        </div>
    </div>
</div>

              
     </div>


    </div>
</div>




@endsection


@section("js")

    <script>
        
    $(function(){

        function del(){

             $.ajax({
              type: "DELETE",
              url: "test.js",
              dataType: "script"
            });

        }
       
    })

    </script>
    
@endsection
