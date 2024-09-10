<div class="header" style="display: flex">
    <div style="width:60px;font-size: 24px; font-weight: 700; color: Blue; text-align: center; margin: 10px; border: 1px solid blue; height: 45px">
        @if(App::getLocale() == 'en')
            <a href="{{\App\Utilities\AppLanguage::languageUrl('vi')}}">VI</a>
        @else
            <a href="{{\App\Utilities\AppLanguage::languageUrl('en')}}">EN</a>
        @endif
    </div>
    <form method="post" action="{{route('user.sendmail')}}">
        @csrf
        <div>
            <button style="cursor:pointer; width:130px;font-size: 24px; font-weight: 700; color: Red; text-align: center; margin: 10px; border: 1px solid Red; height: 45px">SendMail</button>
        </div>
    </form>
    <div style="margin-top: 20px">
        @if(session('message') !== null)
            <span style="text-align: center; color: red">{{session('message')}}</span>
        @endif
    </div>
</div>
