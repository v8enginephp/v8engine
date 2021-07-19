@include("assets.main-head",["title"=>"V8","subTitle"=>"لیست کاربران"])
<link href="@assets/plugins/data-table/DataTables-1.10.16/css/jquery.dataTables.css" rel="stylesheet">
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<style>
    .ui-autocomplete {
        z-index: 9999;
    }
</style>
<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">کامنت ها</h4>
            </div>
            <div class="modal-body">
                <div id="commet_section" class="p-2" style="overflow: auto;height: 10rem;">

                </div>
                <input type="hidden" id="user_id">
                <textarea autocomplete="true" class="form-control" id="comment" placeholder="کامنت خود را وارد کنید."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">بازگشت</button>
                <button class="rounded btn btn-success" id="save_comment">ثبت</button>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-frane"></i>
                    لیست کاربران
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">

                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="" href="#"
                   data-original-title="تمام صفحه">
                    <i class="icon-size-fullscreen"></i>
                    <div class="paper-ripple">
                        <div class="paper-ripple__background"></div>
                        <div class="paper-ripple__waves"></div>
                    </div>
                </a>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="" href="#"
                   data-original-title="کوچک کردن">
                    <i class="icon-arrow-up"></i>
                    <div class="paper-ripple">
                        <div class="paper-ripple__background"></div>
                        <div class="paper-ripple__waves"></div>
                    </div>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <form class="form-inline">
            <label class="mx-auto" for="phone">شماره کاربر : </label>
            <input type="text" class="form-control" name="phone">

            <input type="submit" class="btn btn-success rounded mx-auto" value="جستجو">
        </form>
        <hr>
        <div class="portlet-body">
            {!! \Module\JWT\Model\User::renderTable($users) !!}
        </div>
    </div>
</div>


@include("assets.main-foot")
<script src="@assets/plugins/data-table/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="@assets/js/pages/datatable.js"></script>
<script>
    $(document).on("click", ".login", function (e) {
        console.log(1)
        e.preventDefault()
        href = $(this).attr('data-id');
        submiter([], 'users/login/' + href, "POST")
    })

    $(document).ready(function () {
        $("#parent_id").val({{\Core\App::Request()->input("parent_id")}})
        $("[name='phone']").val('{{\Core\App::Request()->input("phone")}}')
    })


    function openModal(id) {
        $("#commet_section").html("");
        $.get("/users/getComment?user_id=" + id, function (data) {

            var html = "";

            for (var item of data.reverse()) {
                html += `<p class="m-1 bg-blue rounded p-2 text-dark position-relative" style="white-space:
                break-spaces">${item['comment']} <label
                class="text-white position-absolute" style="left: 1rem;bottom: -0.7rem;direction: ltr;">${item["created_at_p"]} - ${item["user"].full_name}</label></p>`;
            }

            $("#commet_section").html(html);
        });

        $("#user_id").val(id);
        $("#comment_modal").modal();
    }

    $("#save_comment").click(function () {
        submiter(["#comment", "#user_id"], "users/setComment", "POST");
    });


    $(function () {
        $("document").ready(function () {
            @php
                $tags=\Module\Comment\Model\Tag::all();
                $items=[];
                foreach($tags as $item){
                    $items[]="#".$item->title;
                }
            @endphp
                tagState = {!! json_encode($items) !!};

            // Helper functions
            function split(val) {
                return val.split("#");
            }

            function extractLast(term) {
                return split(term).pop();
            }


            $("#comment").autocomplete({
                    minLength: 0,
                    autoFocus: true,
                    source: function (request, response) {
                        // Use only the last entry from the textarea (exclude previous matches)
                        lastEntry = extractLast(request.term);

                        var filteredArray = $.map(tagState, function (item) {
                            if (item.indexOf(lastEntry) === 0) {
                                return item;
                            } else {
                                return null;
                            }
                        });

                        // delegate back to autocomplete, but extract the last term
                        response($.ui.autocomplete.filter(filteredArray, lastEntry));
                    },
                    focus: function () {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function (event, ui) {
                        var terms = split(this.value);
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push(ui.item.value);
                        // add placeholder to get the comma-and-space at the end
                        terms.push("");
                        this.value = terms.join(" ");
                        return false;
                    }
                }).on("keydown", function (event) {
                // don't navigate away from the field on tab when selecting an item
                if (event.keyCode === $.ui.keyCode.TAB /** && $(this).data("ui-autocomplete").menu.active **/) {
                    event.preventDefault();
                    return;
                }
            });
        });
    });
</script>
</script>