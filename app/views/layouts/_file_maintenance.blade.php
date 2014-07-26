@if(Auth::user()->ability('', 'manage_areas,manage_regions,manage_contractorgroups,
  manage_projectclassifications,manage_projectcategories,manage_projectsubcategories,
  manage_projectstages,manage_projectstatuses'))
    <li class="divider"></li>
    <li class="dropdown-header">File Maintenance</li>
    @if (Auth::user()->can('manage_areas'))
    <li>{{ HTML::link('areas', 'Areas') }}</li>
    @endif

    @if (Auth::user()->can('manage_regions'))
    <li>{{ HTML::link('regions', 'Regions') }}</li>
    @endif

    @if (Auth::user()->can('manage_contractorgroups'))
    <li>{{ HTML::link('contractorgroups', 'Contractors Groups') }}</li>
    @endif

    @if (Auth::user()->can('manage_projectclassifications'))
    <li>{{ HTML::link('projectclassifications','Project Classifications') }}</li>
    @endif

    @if (Auth::user()->can('manage_projectcategories'))
    <li>{{ HTML::link('projectcategories','Project Categories') }}</li>
    @endif

    @if (Auth::user()->can('manage_projectsubcategories'))
    <li>{{ HTML::link('projectsubcategories','Project Sub Categories') }}</li>
    @endif

    @if (Auth::user()->can('manage_projectstages'))
    <li>{{ HTML::link('projectstages', 'Project Stages') }} </li>
    @endif

    @if (Auth::user()->can('manage_projectstatuses'))
    <li>{{ HTML::link('projectstatuses', 'Project Statuses') }} </li>
    @endif
    <li class="divider"></li>
@endif