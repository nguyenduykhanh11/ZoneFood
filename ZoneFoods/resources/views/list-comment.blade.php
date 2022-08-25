
@foreach($comment as $newComment)
<div class="media">
    <a class="pull-left mr-2" href="#">
        <img
            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwoHCAoJBwkGCAoHCAoICAcIDRIICQcKFREWFhURExMYHCggGCYxGxMTITEhMSkrLi4uFx8zODMsNygtLisBCgoKCw0NDw0NFS0dHxkrKysrKysrLSsrKysrLTcrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAN8A2QMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAAAQIFBgQDB//EADYQAQACAgEBBQUFBwUBAAAAAAABAgMRBAUSISIxUjJBUXKSExVCYmMzNFNhcYKiIyRzgZEU/8QAFgEBAQEAAAAAAAAAAAAAAAAAAAEC/8QAFhEBAQEAAAAAAAAAAAAAAAAAABEB/9oADAMBAAIRAxEAPwD9EAaQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADv8AKO+WhxelXyx2s9vs49NfaBn7g3DocXTsOOPY7XzPrHHw/wAKn0lHM7PN0l+FhtGpxU/6ePkdIraJnDOvyyUY4vkxWwTNMlOzKgAAAAAAAAAAAAAAAAAAAPRwMP8A9GaKx3xXxWBodK4PZiMuaN3nyaceZEajUR3R3JZVIACJSA83K4teTSa2jv8Aw2c9mx2w3mlvc6lldZwbrGWI12PaUZAfzFQAAAAAAAAAAAAAAAAavQsf7TJP4vZZTc6LH+2j49pBogIoAAACJfHmY4yYL1n0vuraNxMT74BykfD0i2SIjJeI/DZVpAAAAAAAAAAAAAAAABudE/d/7mG1eh5Y1fHv2fEitgRuEoAAAACLd0TMpefm5Ix4L2mdeHsg5y87yZJ9VrKnf5yNIAAAAAAAAAAAAAAAAT5Ptw808fNS8eXs2fEB1dbRaItHvWY3SebFI+xzW+SzY3DKpERO0gAjcAT5MfrXI76YqTv1PdzeVXj1nxeO3s1c9e9sl5vbzsuYI7/eAqAAAAAAAAAAAAAAAAAAHm0OF1S2KOxyPFWPZyM81sHTYeRjyxE0vSX23Hm5OImPJb7S8RqMmX6kiuotetY3a2ng5PVaUia4fFdi2ta0atO/62RqI8u4gtlyXzW7eSe9UGsQAQAAAAAAAAAAAAAADcL4sVs89jFG5a3F6VSmr5/9S/p/CDKxYb5v2dLz/g9ePpOW/fbsVbdaxXurGo/kmPNKrIjo1vfl1/RP3P8Ar3+lsBRj/c/69/pPuf8AXv8AS2Aox/uf9e/0n3P+vf6WwFGPPR592b/F87dIyxG65KS3ET3lHNZuFmxe1TcflfCe7unudXO3m5PBxciPFXU+qCjnR6eZwr8ad9ndPU8yoAAAAAAAAAAPtx+PbkXilPrfGImZ7NfOzouBxY42OI7Pjn2rGi/F4teNTsUj5p9T7wlG4ZVIjcG4BIhIAhIAIBII3AJRPkbg3AK3rFomt43EsPqHAnBPbxd+P0+lvT/6rakWia2jcSDlfdsenncaeNkmPwX9l5mkAAAAAAAJ8gaHSMEZcn2lo7qVbW+95emYoxcakfHxPQmqts3CogtuDcKgLbNqgLbNqgLbNqgLbNwqAtuDcKgLbN/FUB5+p4Iz4ZmPOrA13fK6ie+NfHwua5FPssuSn5lxHzAUAAAADW5iPzCY84+aoOjw+HHSvpqvtSs+GPlSC2zapALbNo3BuATs2jcEgnZtUgFtm0SgFtm1QFtm1QFtm1UAvtidVr2eRM/GvabLI6v+8R/xA8IAAAAAB74+aoA6OvsRP5Tb4cHLOTDG/OKvuBs2AGzYAbNgBs2AGzYAbNgBs2AGzYAbZPVpic8a/hNWZ1G/SwuXknLmvf8AtB8gAAAf/9k="
            alt="Image"
            width="60px">
    </a>
    <div class="media-body">
        <h4 class="media-heading" style="color: #3931af">{{$newComment->users->name}}</h4>

        <p>{{$newComment->content}}</p>
        <p>
            @if(($_SESSION['id']!=''))
                <a href="" class="btn btn-sm btn-primary btn-show-form-reply" data-id="{{$newComment->id}}">Trả lời</a>
            @else
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Đăng nhập
                </button>
            @endif
        </p>

        <form action="" method="POST" style="display: none" class="formReply form-reply-{{$newComment->id}}">

            <div>
                <label for="">Nội dung bình luận</label>
                <input type="hidden" value="" name="blog_id">
                <textarea id="content-reply-{{$newComment->id}}" class="form-control" required="required"  rows="3" placeholder="Nhập nội dung(*)"></textarea>
            </div>
            <button type="submit" data-id="{{$newComment->id}}" class="btn btn-primary btn-send-comment-reply">Gửi Trả lời</button>
        </form>
<!--        @if($newComment->reply_id != 0)
            <p>có</p>
        @else
        <h5><a href="#" id="btn-phanhoi">Xem phản hồi</a></h5>
        @endif-->
    <!-- Các bình luận con trả lời  -->
        @foreach($newComment->replies as $child)

        <div class="media">
            <a class="pull-left mr-2" href="#">
                <img
                    src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwoHCAoJBwkGCAoHCAoICAcIDRIICQcKFREWFhURExMYHCggGCYxGxMTITEhMSkrLi4uFx8zODMsNygtLisBCgoKCw0NDw0NFS0dHxkrKysrKysrLSsrKysrLTcrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAN8A2QMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAAAQIFBgQDB//EADYQAQACAgEBBQUFBwUBAAAAAAABAgMRBAUSISIxUjJBUXKSExVCYmMzNFNhcYKiIyRzgZEU/8QAFgEBAQEAAAAAAAAAAAAAAAAAAAEC/8QAFhEBAQEAAAAAAAAAAAAAAAAAABEB/9oADAMBAAIRAxEAPwD9EAaQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADv8AKO+WhxelXyx2s9vs49NfaBn7g3DocXTsOOPY7XzPrHHw/wAKn0lHM7PN0l+FhtGpxU/6ePkdIraJnDOvyyUY4vkxWwTNMlOzKgAAAAAAAAAAAAAAAAAAAPRwMP8A9GaKx3xXxWBodK4PZiMuaN3nyaceZEajUR3R3JZVIACJSA83K4teTSa2jv8Aw2c9mx2w3mlvc6lldZwbrGWI12PaUZAfzFQAAAAAAAAAAAAAAAAavQsf7TJP4vZZTc6LH+2j49pBogIoAAACJfHmY4yYL1n0vuraNxMT74BykfD0i2SIjJeI/DZVpAAAAAAAAAAAAAAAABudE/d/7mG1eh5Y1fHv2fEitgRuEoAAAACLd0TMpefm5Ix4L2mdeHsg5y87yZJ9VrKnf5yNIAAAAAAAAAAAAAAAAT5Ptw808fNS8eXs2fEB1dbRaItHvWY3SebFI+xzW+SzY3DKpERO0gAjcAT5MfrXI76YqTv1PdzeVXj1nxeO3s1c9e9sl5vbzsuYI7/eAqAAAAAAAAAAAAAAAAAAHm0OF1S2KOxyPFWPZyM81sHTYeRjyxE0vSX23Hm5OImPJb7S8RqMmX6kiuotetY3a2ng5PVaUia4fFdi2ta0atO/62RqI8u4gtlyXzW7eSe9UGsQAQAAAAAAAAAAAAAADcL4sVs89jFG5a3F6VSmr5/9S/p/CDKxYb5v2dLz/g9ePpOW/fbsVbdaxXurGo/kmPNKrIjo1vfl1/RP3P8Ar3+lsBRj/c/69/pPuf8AXv8AS2Aox/uf9e/0n3P+vf6WwFGPPR592b/F87dIyxG65KS3ET3lHNZuFmxe1TcflfCe7unudXO3m5PBxciPFXU+qCjnR6eZwr8ad9ndPU8yoAAAAAAAAAAPtx+PbkXilPrfGImZ7NfOzouBxY42OI7Pjn2rGi/F4teNTsUj5p9T7wlG4ZVIjcG4BIhIAhIAIBII3AJRPkbg3AK3rFomt43EsPqHAnBPbxd+P0+lvT/6rakWia2jcSDlfdsenncaeNkmPwX9l5mkAAAAAAAJ8gaHSMEZcn2lo7qVbW+95emYoxcakfHxPQmqts3CogtuDcKgLbNqgLbNqgLbNqgLbNwqAtuDcKgLbN/FUB5+p4Iz4ZmPOrA13fK6ie+NfHwua5FPssuSn5lxHzAUAAAADW5iPzCY84+aoOjw+HHSvpqvtSs+GPlSC2zapALbNo3BuATs2jcEgnZtUgFtm0SgFtm1QFtm1QFtm1UAvtidVr2eRM/GvabLI6v+8R/xA8IAAAAAB74+aoA6OvsRP5Tb4cHLOTDG/OKvuBs2AGzYAbNgBs2AGzYAbNgBs2AGzYAbZPVpic8a/hNWZ1G/SwuXknLmvf8AtB8gAAAf/9k="
                    alt="Image"
                    width="60px">
            </a>
            <div class="media-body">
                <h4 class="media-heading" style="color: #3931af">{{$child->users->name}}</h4>
                @if( $newComment->id - $child->reply_id== 0)
                   <span > <span style="color: black; font-size: 18px">{{$newComment->users->name}}</span> {{$child->content}}</span>
                @endif


                <!-- Các bình luận trả lời  -->
                <p>
                    @if($_SESSION['id']!='')
                        <a href="" class="btn btn-sm btn-primary" >Trả lời</a>
                    @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Đăng nhập
                        </button>
                    @endif
                </p>
                <form action="" method="POST" style="display: none">

                    <div>
                        <label for="">Nội dung bình luận</label>
                        <input type="hidden" value="" name="blog_id">
                        <textarea name="content" class="form-control" required="required"  rows="3" placeholder="Nhập nội dung(*)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi Trả lời</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach
