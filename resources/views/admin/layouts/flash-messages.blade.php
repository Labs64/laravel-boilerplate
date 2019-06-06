@if(session()->get('flash_warning'))
    <div class="alert-container">
        <div class="alert alert-warning">
            <div class="alert-icon pull-left"><i class="glyphicon glyphicon-warning-sign"></i></div>
            <div class="alert-description">
                @if(is_array(json_decode(session()->get('flash_warning'), true)))
                    {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_warning') !!}
                @endif
            </div>
        </div>
    </div>
@elseif (session()->get('flash_success'))
<div class="alert-container common-success-message">
    <div class="alert alert-success">
        <div class="alert-icon pull-left"><i class="glyphicon glyphicon-ok-circle"></i></div>
        <div class="alert-description">
            @if(is_array(json_decode(session()->get('flash_success'), true)))
                {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_success') !!}
            @endif
        </div>
    </div>
</div>
@endif