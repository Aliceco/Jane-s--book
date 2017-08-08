$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    // 审核
   $(".post-audit").click(function(event){
    var target = $(event.target);
    var post_id = target.attr("post-id");
    var status = target.attr("post-action-status");

    $.ajax({
        url: "/admin/posts/" + post_id + "/status",
        type: "POST",
        data: { "status": status },
        dataType: "json",
        success: function success(data) {
            if (data.error != 0) {
                alert(data.msg);
                return;
            }
            target.parent().parent().remove();
        }
    });
});
    // 回到审核
    $(".post-audit_a").click(function(event){
        var target = $(event.target);
        var post_id = target.attr("post-id");
        var status = target.attr("post-action-status");

        $.ajax({
            url: "/admin/posts/" + post_id + "/backAudit",
            type: "POST",
            data: { "status": status },
            dataType: "json",
            success: function success(data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }
                target.parent().parent().remove();
            }
        });
    });
    // 删除拒绝的文章
    $(".post-delete").click(function(event){
            var cnf = confirm("你确定从拒绝文章中永久删除吗？");
            var target = $(event.target);
            var post_id = target.attr("post-id");
            var status = target.attr("post-action-status");
              if( cnf ){
                  $.ajax({
                      url: "/admin/posts/" + post_id + "/refusedStatus",
                      type: "POST",
                      data: { "status": status },
                      dataType: "json",
                      success: function success(data) {
                          if (data.error != 0) {
                              alert(data.msg);
                              return;
                          }
                          target.parent().parent().remove();
                      }
                  });
              }
        });

    // 专题删除
    $(".resource-delete").click(function(event){
     var target = $(event.target);
     var value = target.attr("delete-value");
     var topic_id = target.attr("topic_id");
     var cnf = confirm("你确定永久删除这个"+ value +"专题吗？");
        if( cnf ){
            $.ajax({
                url: '/admin/topics/'+topic_id+'/topicStatus',
                type: "POST",
                data: { "topics": topic_id },
                dataType: "json",
                success: function success(data) {
                    if (data.error != 0) {
                        alert(data.msg);
                        return;
                    }
                    target.parent().parent().remove();
                }
            });
        }
    });

    // 权限删除
$(".permission-delete").click(function(event){
    var target = $(event.target);
    var value = target.attr("delete-value");
    var permissions_id = target.attr("permission_id");
    var cnf = confirm("你确定永久删除这个"+ value +"权限吗？");
    if( cnf ){
        $.ajax({
            url: "/admin/permissions/"+ permissions_id +"/delete",
            type: "POST",
            data: { "permissions_id": permissions_id },
            dataType: "json",
            success: function success(data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }
                target.parent().parent().remove();
            },
            error: function(e) {
               console.log(e);
            }
        });
    }
});

   // 通知删除
$(".notice-delete").click(function(event){
    var target = $(event.target);
    var value = target.attr("delete-value");
    var notice_id = target.attr("notice_id");
    var cnf = confirm("你确定永久删除这个"+ value +"通知吗？");
    if( cnf ){
        $.ajax({
            url: "/admin/notices/"+ notice_id +"/noticesStatus",
            type: "POST",
            data: { "notice_id": notice_id },
            dataType: "json",
            success: function success(data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }
                target.parent().parent().remove();
            },
            error: function(e) {
                console.log(e);
            }
        });
    }
});

  // 轮播图删除
$(".slide-delete").click(function(event){
    var target = $(event.target);
    var value = target.attr("delete-value");
    var slide_id = target.attr("slide-id");
    var cnf = confirm("你确定永久删除这个"+ value +"通知吗？");
    if( cnf ){
        $.ajax({
            url: "/admin/slide/"+ slide_id +"/deleteStatus",
            type: "POST",
            data: { "slide_id": slide_id },
            dataType: "json",
            success: function success(data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }
                target.parent().parent().remove();
            },
            error: function(e) {
                console.log(e);
            }
        });
    }
});



