@extends('admin.layouts.blank')
@section('content')
<div class="row">

    <div class="col-md-12">
        <!-- .message -->
        <div class="message">
            {{-- <!-- message header -->
        <div class="message-header d-none">
            <div class="d-flex">
                <a class="btn btn-light btn-icon" href="page-messages.html"><i
                        class="fa fa-flip-horizontal fa-share"></i></a>
            </div>
            <h4 class="message-title"> Invitation: Joe's Dinner @ Fri Aug 22 </h4>
            <div class="message-header-actions">
                <!-- invite members -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-light btn-icon" title="Invite members" data-toggle="dropdown"
                        data-display="static" aria-haspopup="true" aria-expanded="false"><i
                            class="fas fa-user-plus"></i></button> <!-- .dropdown-menu -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-rich stop-propagation">
                        <div class="dropdown-arrow"></div>
                        <div class="dropdown-header"> Add members </div>
                        <div class="form-group px-3 py-2 m-0">
                            <input type="text" class="form-control" placeholder="e.g. @bent10" data-toggle="tribute"
                                data-remote="assets/data/tribute.json" data-menu-container="#people-list"
                                data-item-template="true" data-autofocus="true" data-tribute="true"> <small
                                class="form-text text-muted">Search people by username or email address to invite
                                them.</small>
                        </div>
                        <div id="people-list" class="tribute-inline stop-propagation"></div><a href="#"
                            class="dropdown-footer">Invite member by link <i class="far fa-clone"></i></a>
                    </div><!-- /.dropdown-menu -->
                </div><!-- /invite members -->
                <button type="button" class="btn btn-light btn-icon d-xl-none" data-toggle="sidebar"><i
                        class="fa fa-angle-double-left"></i></button>
            </div>
        </div><!-- /message header --> --}}
            <!-- message body -->
            <div class="message-body">
                <!-- .card -->
                <div class="card card-fluid mb-0">
                    <!-- .conversations -->
                    <div role="log" class="conversations">
                        <!-- .conversation-list -->
                        <ul class="conversation-list">
                            <!-- .conversation-divider -->
                            <li class="log-divider">
                                <span><i class="far fa-fw fa-comment-alt"></i> Chat started by <strong>Diane
                                        Peters</strong>
                                    · Wed, Feb 14, 2018</span>
                            </li><!-- /.conversation-divider -->
                            <!-- .conversation-inbound -->
                            <li class="conversation-inbound">
                                <div class="conversation-avatar">
                                    <a href="#" class="tile tile-circle bg-muted"><i class="oi oi-person"></i></a>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text"> Fuga quis quod voluptas mollitia aliquid
                                        alias
                                        tenetur. </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                            </li><!-- /.conversation-inbound -->
                            <!-- .conversation-inbound -->
                            <li class="conversation-inbound conversation-faux">
                                <div class="conversation-message conversation-message-skip-avatar">
                                    <div class="conversation-message-text"> Laboriosam asperiores cupiditate aperiam!
                                    </div>
                                    <div class="conversation-meta"> Diane Peters · 20m </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                            </li><!-- /.conversation-inbound -->
                            <!-- .conversation-outbound -->
                            <li class="conversation-outbound">
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text"> Expedita officiis delectus perspiciatis a
                                        dolores. </div>
                                </div>
                            </li><!-- /.conversation-outbound -->
                            <!-- .conversation-outbound -->
                            <li class="conversation-outbound conversation-faux">
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text"> Consectetur quis. </div>
                                    <div class="conversation-meta"> Beni Arisandi · 14m </div>
                                </div>
                            </li><!-- /.conversation-outbound -->
                            <!-- .conversation-divider -->
                            <li class="log-divider">
                                <span><i class="fa fa-fw fa-user-plus"></i> <strong>Jennifer</strong> and <strong>2
                                        others</strong> invited to the chat · 5:06 PM</span>
                            </li><!-- /.conversation-divider -->
                            <!-- .conversation-inbound -->
                            <li class="conversation-inbound">
                                <div class="conversation-avatar">
                                    <a href="#" class="user-avatar"><img src="//source.unsplash.com/QAB-WJcbgJk/60x60"
                                            alt="">
                                        <span class="avatar-badge online"></span></a>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text"> Officiis numquam, repellat nam tempore sit
                                        nostrum autem excepturi quis nihil. </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                            </li><!-- /.conversation-inbound -->
                            <!-- .conversation-inbound -->
                            <li class="conversation-inbound conversation-faux">
                                <div class="conversation-message conversation-message-skip-avatar">
                                    <div class="conversation-message-text has-attachment">
                                        <div class="pswp-gallery" data-pswp-uid="1">
                                            <!-- .card-figure -->
                                            <div class="card card-figure">
                                                <!-- .card-figure -->
                                                <figure class="figure">
                                                    <!-- .figure-img -->
                                                    <div class="figure-img figure-attachment">
                                                        <img src="//uselooper.com/assets/images/dummy/img-5.jpg"
                                                            alt="Card image cap"> <a
                                                            href="//uselooper.com/assets/images/dummy/img-5.jpg"
                                                            class="img-link" data-size="600x450"><span
                                                                class="tile tile-circle bg-danger"><span
                                                                    class="oi oi-eye"></span></span> <span
                                                                class="img-caption d-none">Card image cap</span></a>
                                                    </div><!-- /.figure-img -->
                                                    <figcaption class="figure-caption">
                                                        <ul class="list-inline d-flex text-muted mb-0">
                                                            <li class="list-inline-item text-truncate mr-auto">Cajun
                                                                Chicken
                                                                Egg Pasta </li>
                                                            <li class="list-inline-item">
                                                                <button type="button" class="btn btn-reset"
                                                                    title="Download"><span
                                                                        class="oi oi-data-transfer-download"></span></button>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure><!-- /.card-figure -->

                                            </div><!-- /.card-figure -->
                                        </div>
                                    </div>
                                    <div class="conversation-meta"> Jennifer Gray · 13m </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                            </li><!-- /.conversation-inbound -->
                            <!-- .conversation-outbound -->
                            <li class="conversation-outbound">
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text has-attachment">
                                        <div class="media align-items-center">
                                            <span class="fa-stack fa-lg mr-1"><i
                                                    class="fa fa-square fa-stack-2x text-white"></i> <i
                                                    class="fa fa-file-pdf fa-stack-1x text-muted"></i></span> <a
                                                href="#" class="media-body">double-broccoli-quinoa.pdf</a>
                                        </div>
                                    </div>
                                    <div class="conversation-meta"> Beni Arisandi · 5m </div>
                                </div>
                            </li><!-- /.conversation-outbound -->
                            <!-- .conversation-inbound -->
                            <li class="conversation-inbound">
                                <div class="conversation-avatar">
                                    <a href="#" class="tile tile-circle bg-teal">ZF</a>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text"> Ad earum dolore excepturi itaque officia vel
                                        fugiat quo. </div>
                                    <div class="conversation-meta"> Zachary Fowler · 3m </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                            </li><!-- /.conversation-inbound -->
                            <!-- .conversation-divider -->
                            <li class="log-divider">
                                <span class="text-danger"><i class="oi oi-ban fa-fw"></i> The file sent by
                                    <strong>Zachary
                                        Fowler</strong> is too large · 2m</span>
                            </li><!-- /.conversation-divider -->
                            <!-- .conversation-inbound -->
                            <li class="conversation-inbound">
                                <div class="conversation-avatar">
                                    <a href="#" class="tile tile-circle bg-teal">ZF</a>
                                </div>
                                <div class="conversation-message">
                                    <div class="conversation-message-text has-attachment">
                                        <div class="media align-items-center">
                                            <span class="fa-stack fa-lg mr-1"><i
                                                    class="fa fa-square fa-stack-2x text-muted"></i> <i
                                                    class="fa fa-file-pdf fa-stack-1x text-white"></i></span> <a
                                                href="#" class="media-body">Baked-Chicken-and-Spinach-Flautas.pdf</a>
                                        </div>
                                    </div>
                                    <div class="conversation-meta"> Zachary Fowler · Just now </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i
                                            class="fa fa-fw fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-arrow ml-n1"></div><button type="button"
                                            class="dropdown-item">Copy text</button> <button type="button"
                                            class="dropdown-item">Edit</button> <button type="button"
                                            class="dropdown-item">Reply</button> <button type="button"
                                            class="dropdown-item">Remove</button>
                                    </div>
                                </div>
                            </li><!-- /.conversation-inbound -->
                            <!-- .conversation-inbound -->
                            <!-- /.conversation-inbound -->
                        </ul><!-- /.conversation-list -->
                    </div><!-- /.conversations -->
                </div><!-- /.card -->
            </div><!-- /message body -->
            <!-- message publisher -->
            <div class="message-publisher d-none">
                <!-- form -->
                <form>
                    <!-- .media -->
                    <div class="media mb-1">
                        <div class="btn btn-light btn-icon fileinput-button">
                            <i class="fa fa-paperclip"></i> <input type="file" id="pm-attachment" name="pmAttachment[]"
                                multiple="">
                        </div>
                        <div class="media-body">
                            <input type="text" class="form-control border-0 shadow-none" name="messageText"
                                placeholder="Type a message">
                        </div>
                        <div>
                            <button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                            <button type="submit" class="btn btn-light btn-icon"><i
                                    class="far fa-paper-plane"></i></button>
                        </div>
                    </div><!-- /.media -->
                </form><!-- /form -->
            </div><!-- /message publisher -->
        </div><!-- /.message -->
    </div>

</div>
@endsection
@push('styles')
<link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" />
{{-- <link rel="stylesheet" href="//uselooper.com/assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css"> --}}
{{-- <link rel="stylesheet" href="//uselooper.com/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"> --}}
{{-- <link rel="stylesheet" href="//uselooper.com/assets/vendor/tributejs/tribute.css"> --}}
<link rel="stylesheet" href="//uselooper.com/assets/vendor/photoswipe/photoswipe.css">
{{-- <link rel="stylesheet" href="//uselooper.com/assets/vendor/photoswipe/default-skin/default-skin.css"> --}}
<!-- END PLUGINS STYLES -->
<!-- BEGIN THEME STYLES -->
{{-- <link rel="stylesheet" href="//uselooper.com/assets/stylesheets/theme.min.css" data-skin="default"> --}}
{{-- <link rel="stylesheet" href="//uselooper.com/assets/stylesheets/theme-dark.min.css" data-skin="dark"> --}}
{{-- <link rel="stylesheet" href="//uselooper.com/assets/stylesheets/custom.css"> --}}

@endpush


@push('styles')
<style>

</style>
@endpush
