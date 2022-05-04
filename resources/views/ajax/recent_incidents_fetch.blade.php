@foreach($incidents as $incident)
<div class="media-support">
    <div class="media-support-header mb-2">
        <div class="media-support-info mt-2">
            <h5 class="mb-0"><a href="/incidents/details/{{ $incident->id }}" class="">{!! __('incidents.incident') !!} #{{ sprintf("%04d", $incident->id) }} - {{ config_trans('constants.incidents.response.'.$incident->response) }} - {{ $incident->title }}</a></h5>
            <small>{{ $incident->updated_at }}</small>
            <span class="badge badge-secondary">{{ config_trans('constants.incidents.status.'.$incident->status) }}</span>
        </div>
    </div>
    <div class="media-support-body">
        <p class="mb-0"><b>{!! __('incidents.responding_units') !!}:</b> <span class="text-white">{!! $incident->responding_units ? $incident->responding_units : __('core.na') !!}</span> </p>
        <div class="h4 mt-2 mb-0">
            <span class="badge badge-secondary">{{ config_trans('constants.incidents.type.'.$incident->type) }}</span>
        </div>
    </div>
</div>
<hr class="mt-4 mb-4">
@endforeach
