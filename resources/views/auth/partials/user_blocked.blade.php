<b-message
    title="{{ trans('auth.user_blocked') }}"
    type="is-danger"
    has-icon
    aria-close-label="Close notification"
    role="alert"
    :closable="false">
    {{ trans('auth.user_blocked_text') }}
</b-message>
