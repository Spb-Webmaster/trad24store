<li class="con_item {{ active_linkMenu(asset(route('m_users')), 'find')  }}"><a
        href="{{ route('m_users') }}">{{ __('Медиаторы') }}
        @if($users_no_publiched)
            <span class="_int">{{ $users_no_publiched }}</span>
        @endif
    </a></li>
<li class="con_item {{ active_linkMenu(asset(route('m_reports')), 'find')  }}"><a
        href="{{ route('m_reports') }}">{{ __('Отчеты') }}
        @if($report_no_publiched)
            <span class="_int">{{ $report_no_publiched }}</span>
        @endif
    </a></li>
<li class="con_item {{ active_linkMenu(asset(route('m_comments')), 'find')  }}"><a
        href="{{ route('m_comments') }}">{{ __('Отзывы') }}
        @if($comment_no_publiched)
            <span class="_int">{{ $comment_no_publiched }}</span>
        @endif
    </a></li>

