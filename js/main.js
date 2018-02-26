$(".detail").click(function(){
    var id = $(this).attr("data-id");
    var url = "http://localhost:8080/club/activity.php?id=" + id;
    window.location.href = url;
});

$(".add_club").click(function(){
    layer.open({
        type: 1,
        area: ['350px', '350px'],
        title : '建立社团',
        shadeClose: true, //点击遮罩关闭
        closeBtn: 0,
        scrollbar: false,
        content: '<div class="main_pop"><div class="popup_wrap"><div class="d_item"><label for="">社团名称：</label><input type="text" class="form-control pop_cname" /></div><div class="d_item"><label for="">社团宗旨：</label><input type="text" class="form-control pop_ccontent" /></div><div class="d_item"><label for="">编号：</label><input type="text" class="form-control pop_cno" /></div><button class="btn btn-primary pop_btn" style="margin: 10px auto;">提交</button></div>'
        });


    $(".pop_btn").click(function(){
        var cname = $(".pop_cname").val();
        var ccontent = $(".pop_ccontent").val();
        var cno = $(".pop_cno").val();
        var data = {
            "cno" : cno,
            "cname" : cname,
            "ccontent" : ccontent,
        };
        $.ajax({
            data : data,
            dataType : "text",
            url : "http://localhost:8080/club/add_club.php",
            type : "POST",
            success :function(data){
                if(data == "ok"){
                    window.location.reload();
                }
            },
            error: function(data){
                console.log(data);
                
            },
            });
        });
    });


    $(".add-act").click(function(){
        var sel = $(this).parent().parent();
        var ano = sel.find("td").eq(0).html();
        var cno = $(".cno").val();
        var data = {
            "ano" : ano,
            "cno" : cno
        };
        $.ajax({
            data : data,
            dataType : "text",
            url : "http://localhost:8080/club/add-act.php",
            type : "POST",
            success :function(data){
                if(data == "ok"){
                    swal("参加成功","","success");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    swal("参加错误","","error");
                }
            },
            error: function(data){
                console.log(data);
                swal("参加错误","","error");
            },
            });
    });

    $(".back").click(function(){
        var self = $(this).parent().parent();
        
        layer.open({
        type: 1,
        area: ['350px', '350px'],
        title : '建立社团',
        shadeClose: true, //点击遮罩关闭
        closeBtn: 0,
        scrollbar: false,
        content: '<div class="main_pop"><div class="popup_wrap"><div class="d_item"><label for="" style="float: left;">活动反馈：</label><textarea name="" id="aback" cols="30" rows="10"></textarea></div><button class="btn btn-primary back_btn" style="margin: 10px auto;">提交</button></div>'
        });

        $(".back_btn").click(function(){
            var ano = self.find("td").eq(0).html();
            var aback = $("#aback").val();
            var data = {
                "aback" : aback,
                "ano" :ano
            };
            $.ajax({
                data : data,
                dataType : "text",
                url : "http://localhost:8080/club/back.php",
                type : "POST",
                success :function(data){
                    if(data == "ok"){
                        swal("反馈成功","","success");
                        setTimeout(function(){
                            window.location.reload();
                        },2000);
                    }else{
                        swal("反馈错误","","error");
                    }
                },
                error: function(data){
                    console.log(data);
                    swal("反馈错误","","error");
                },
                });
        })

    });

    $(".join-club").click(function(){
        var sel = $(this).parent();
        var cno = sel.find("a").eq(1).attr("data-id");
        var data = {
            "cno" : cno
        };
        $.ajax({
            data : data,
            dataType : "text",
            url : "http://localhost:8080/club/join-club.php",
            type : "POST",
            success :function(data){
                if(data == "ok"){
                    swal("成功添加审核","等待管理员同意","success");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    swal("参加错误","","error");
                }
            },
            error: function(data){
                console.log(data);
                swal("参加错误","","error");
            },
            });
    });

    $(".agree").click(function(){
        var sel = $(this).parent().parent();
        var sno = sel.find("td").eq(0).html();
        var data = {
            "sym" : 1,
            "sno" : sno, 
        };
        $.ajax({
            data : data,
            dataType : "text",
            url : "http://localhost:8080/club/agree.php",
            type : "POST",
            success :function(data){
                if(data == "ok"){
                    swal("成功审核","","success");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    swal("审核失败","","error");
                }
            },
            error: function(data){
                console.log(data);
                swal("审核失败","","error");
            },
            });
    });

    $(".disagree").click(function(){
        var sel = $(this).parent().parent();
        var sno = sel.find("td").eq(0).html();
        var data = {
            "sym" : 2,
            "sno" : sno, 
        };
        $.ajax({
            data : data,
            dataType : "text",
            url : "http://localhost:8080/club/agree.php",
            type : "POST",
            success :function(data){
                if(data == "ok"){
                    swal("成功审核","","success");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    swal("审核失败","","error");
                }
            },
            error: function(data){
                console.log(data);
                swal("审核失败","","error");
            },
            });
    });

    $(".leave").click(function(){
        window.location.href = "http://localhost:8080/club/leave.php";
    });

