<div class="left_menu">
        <ul class="left_m nav menu">
            <li class="{{ active_linkMenu(asset(route('prof_mediators')), 'find') }}">
                <a class="{{ active_linkMenu(asset(route('prof_mediators')), 'find') }}"
                   href="{{ route('prof_mediators')  }}">{{ config('links.link.prof_mediators') }}</a>
            </li>
            <li class="{{ active_linkMenu(asset(route('company_mediators')), 'find') }}">
                <a class="{{ active_linkMenu(asset(route('company_mediators')), 'find') }}"
                   href="{{ route('company_mediators')  }}">{{ config('links.link.company_mediators') }}</a>
            </li>
            <li class="{{ active_linkMenu(asset(route('notprof_mediators')), 'find') }}">
                <a class="{{ active_linkMenu(asset(route('notprof_mediators')), 'find') }}"
                   href="{{ route('notprof_mediators')  }}">{{ config('links.link.notprof_mediators') }}</a>
            </li>
        </ul>

</div><!--.left_bar-->
