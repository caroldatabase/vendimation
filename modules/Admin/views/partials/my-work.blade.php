<h4>Work Detail</h4>
<div class="personal-box work-detail">
    
    <div class="row">
        <div class="col-sm-12 work-detail-border">
            <label>Nature of your business</label>
            <p class="pro-tags">
                @foreach($businessNatureType as $result)
                @if(in_array($result->id,$bn))
                 <?php $bnt=1;?>
                <a href="#" style="float: left; margin: 3px">{{$result->title}}</a> 
                @endif
                @endforeach
                @if(!isset($bnt))
                 <a href="#">NA</a> 
                 @endif
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 work-detail-border">
        <label>Targeting Market</label>
        <p class="pro-tags">
        @foreach($targetMarketType as $result)
            @if(in_array($result->id,$tm))
            <?php $tmy=1;?>
                <a href="#" style="float: left; margin: 3px">{{$result->title}}</a> 
            @endif    
        @endforeach
        @if(!isset($tmy))
         <a href="#">NA</a> 
         @endif
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 work-detail-border">
        <label>Targeting countries / cities / region</label>
        <p class="pro-tags"><a href="#">
            {{$user->region or 'NA'}}
        </a></p>
        </div>
    </div>

</div>
