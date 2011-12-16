
$(document).ready(function(){
    $('#gymlocality').attr('disabled', true);
    //$('#btngymshowhide').attr('disabled', true);
    $('#btngymsearch').attr('disabled', true);
     $('#bdlocality').attr('disabled', true);
    //$('#btnbdshowhide').attr('disabled', true);
    $('#btnbdsearch').attr('disabled', true);
    $('#btngymcontentshowhide').hide();
    
    
    $('#gymcity').change(function(){
        var city_id = $('#gymcity').val();
        if (city_id != ""){
            var post_url = "http://"+location.host+"/the-gym-project/index.php/main/get_gymlocalities/" + city_id;
            $.ajax({
                type: "POST",
                url: post_url,
                dataType:"json",
                success: function(localities) 
                {
                    $('#gymlocality').empty();
                    $('#gymlocality').attr('disabled', false);
                    $('#btngymsearch').attr('disabled', false);
                    $('#btngymshowhide').attr('disabled', false);
                    var ctr=0;
                    $.each(localities,function(locality)
                    {
                        var opt = $('<option />');
                        opt.val(locality);
                        opt.text(locality);
                        $('#gymlocality').append(opt); 
                        ctr++;
                    });
                    if(ctr==0){ 
                        $('#btngymsearch').attr('disabled', true);
                        $('#btngymshowhide').attr('disabled', true);
                    }
                },
                error:function(xhr,err){
                    alert('error');
                    alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
                    alert("responseText: "+xhr.responseText);
                }

            }); //end AJAX

        } 
        else {
            $('#gymlocality').empty();
            $('#gymlocality').attr('disabled', true);
            $('#btngymshowhide').attr('disabled', true);
            $('#btngymsearch').attr('disabled', true);
        }//end if
    }); //end change 
    
    $("#btngymsearch").click(function(event){
        var city_id = $('#gymcity').val();
        var loc_id = $('#gymlocality').val();
        //$('#gymcontent').load('index.php/main/showgymdata/'+city_id+'/'+loc_id );
        var post_url = "http://"+location.host+"/the-gym-project/index.php/main/showgymdata/"+city_id+'/'+loc_id ;
        $.ajax({
            type: "POST",
            url: post_url,
            dataType: "html",
            cache:false,
            success: 
            function(data){
                $("#gymcontent").empty().append(data);
                $('#btngymcontentshowhide').show();
            },
            error:function(xhr,err){
                alert('error');
            }
        });
    });
    
    $("#btngymshowhide").click(function(event){
        $("#gymcontent").toggle(800);
    });
    //*************************************************
      $('#bdcity').change(function(){
        var city_id = $('#bdcity').val();
        if (city_id != ""){
            var post_url = "http://"+location.host+"/the-gym-project/index.php/main/get_userlocalities/" + city_id;
            $.ajax({
                type: "POST",
                url: post_url,
                dataType:"json",
                success: function(localities) 
                {
                    $('#bdlocality').empty();
                    $('#bdlocality').attr('disabled', false);
                    $('#btnbdsearch').attr('disabled', false);
                    $('#btnbdshowhide').attr('disabled', false);
                    var ctr=0;
                    $.each(localities,function(locality)
                    {
                        var opt = $('<option />');
                        opt.val(locality);
                        opt.text(locality);
                        $('#bdlocality').append(opt); 
                        ctr++;
                    });
                    if(ctr==0){ 
                        $('#btnbdsearch').attr('disabled', true);
                        $('#btnbdshowhide').attr('disabled', true);
                    }
                },
                error:function(xhr,err){
                    alert('error');
                    alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
                    alert("responseText: "+xhr.responseText);
                }

            }); //end AJAX

        } 
        else {
            $('#bdlocality').empty();
            $('#bdlocality').attr('disabled', true);
            $('#btnbdshowhide').attr('disabled', true);
            $('#btnbdsearch').attr('disabled', true);
        }//end if
    }); //end change 
    
    $("#btnbdsearch").click(function(event){
        var city_id = $('#bdcity').val();
        var loc_id = $('#bdlocality').val();
        //$('#gymcontent').load('index.php/main/showgymdata/'+city_id+'/'+loc_id );
        var post_url = "http://"+location.host+"/the-gym-project/index.php/main/showbuddydata/"+city_id+'/'+loc_id ;
        $.ajax({
            type: "POST",
            url: post_url,
            dataType: "html",
            cache:false,
            success: 
            function(data){
                $("#gymcontent").empty().append(data);
                $('#btngymcontentshowhide').show();
            },
            error:function(xhr,err){
                alert('error');
            }
        });
    });
    
    $("#btnbdshowhide").click(function(event){
        $("#gymcontent").toggle(800);
    });
    $("#btngymcontentshowhide").click(function(event){
        
        $("#gymcontent").toggle(800);
    });

});