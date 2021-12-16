import React, {Fragment} from 'react'
import * as moment from 'moment';
import {Menu, Transition} from "@headlessui/react";
import {
    ChatAltIcon,
    CodeIcon,
    DotsVerticalIcon,
    EyeIcon,
    FlagIcon,
    ShareIcon,
    StarIcon,
    ThumbUpIcon
} from "@heroicons/react/solid";
import ProfileImage from "@/Components/ProfileImage";
import PostImage from "@/Components/PostImage";
import {now, round} from "lodash";

function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}

function PostTime(created_at) {
    const created_at_moment = moment(created_at);
    const now_moment = moment();
    const diff = now_moment.diff(created_at_moment);
    const diffDuration = moment.duration(diff);
    const days_since_posted = diffDuration.days()
    const hours_since_posted = diffDuration.hours()
    const minutes_since_posted = diffDuration.minutes()
    if (days_since_posted > 0) {
        if (created_at_moment.year() === now_moment.year()) {
            return created_at_moment.format('MMM D');
        } else {
            return created_at_moment.format('MMM D, YYYY');
        }
    } else if(hours_since_posted > 0) {
        return round(hours_since_posted) + 'h';
    } else if (minutes_since_posted > 0) {
        return round(minutes_since_posted) + 'm';
    } else {
        return 'Just now';
    }
}

function TrimDescription(description) {
    let trim_length = 300;
    let full_length = description.length;
    let trimmed_description = description;
    if (full_length > trim_length) {
        trimmed_description = description.substring(0, trim_length) + '...';
    }
    return trimmed_description;
}

export default function Post(props) {
    return (
        <article aria-labelledby={'post-title-' + props.post.id}>
            {/*{JSON.stringify(props.post)}*/}
            <div>
                <div className="flex space-x-3">
                    <ProfileImage user={props.post?.user} />
                    <div className="min-w-0 flex-1">
                        <p className="font-medium">
                            <a className="hover:underline" href={'/user/' + props?.post?.user_id + '/profile'}>
                                {props.post?.user?.name}
                            </a>
                        </p>
                        <p className="text-sm text-gray-400">
                            <a href={'/post/' . props?.post?.active_post_details?.[0]?.slug}>
                                <time dateTime={props.post?.created_at}>
                                    {PostTime(props.post?.created_at)}
                                </time>
                            </a>
                        </p>
                    </div>
                    <div className="flex-shrink-0 self-center flex">
                        <Menu as="div" className="relative inline-block text-left">
                            <div>
                                <Menu.Button className="-m-2 p-2 rounded-full flex items-center text-gray-300 hover:text-gray-600">
                                    <span className="sr-only">Open options</span>
                                    <DotsVerticalIcon className="h-5 w-5" aria-hidden="true"/>
                                </Menu.Button>
                            </div>
                            <Transition
                                as={Fragment}
                                enter="transition ease-out duration-100"
                                enterFrom="transform opacity-0 scale-95"
                                enterTo="transform opacity-100 scale-100"
                                leave="transition ease-in duration-75"
                                leaveFrom="transform opacity-100 scale-100"
                                leaveTo="transform opacity-0 scale-95"
                            >
                                <Menu.Items className="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style={{zIndex: 9999}}>
                                    <div className="py-1">
                                        <Menu.Item>
                                            {({active}) => (
                                                <a
                                                    href="#"
                                                    className={classNames(
                                                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                                                        'flex px-4 py-2 text-sm'
                                                    )}
                                                >
                                                    <StarIcon className="mr-3 h-5 w-5 text-gray-400" aria-hidden="true"/>
                                                    <span>Add to favorites</span>
                                                </a>
                                            )}
                                        </Menu.Item>
                                        <Menu.Item>
                                            {({active}) => (
                                                <a
                                                    href="#"
                                                    className={classNames(
                                                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                                                        'flex px-4 py-2 text-sm'
                                                    )}
                                                >
                                                    <CodeIcon className="mr-3 h-5 w-5 text-gray-400" aria-hidden="true"/>
                                                    <span>Embed</span>
                                                </a>
                                            )}
                                        </Menu.Item>
                                        <Menu.Item>
                                            {({active}) => (
                                                <a
                                                    href="#"
                                                    className={classNames(
                                                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                                                        'flex px-4 py-2 text-sm'
                                                    )}
                                                >
                                                    <FlagIcon className="mr-3 h-5 w-5 text-gray-400" aria-hidden="true"/>
                                                    <span>Flag for review</span>
                                                </a>
                                            )}
                                        </Menu.Item>
                                    </div>
                                </Menu.Items>
                            </Transition>
                        </Menu>
                    </div>
                </div>
                <a href={'/posts/' + props?.post?.active_post_details?.[0]?.slug}>
                    <PostImage post={props.post} />
                </a>
                <h2 id={'post-title-' + props.post?.id} className="mt-4 text-base font-medium text-gray-900">
                    <a className="hover:text-gray-300 text-purple-800" href={'/posts/' + props?.post?.active_post_details?.[0]?.slug}>
                        <strong>{props?.post?.active_post_details?.[0]?.title}</strong>
                    </a>
                </h2>
                <p className="text-sm text-gray-400">
                    <a className="hover:underline" href={'/system/' + props?.post?.system_id + '/posts'}>
                        {props?.post?.system?.name}
                    </a>
                    <span className="mx-1">-</span>
                    <a className="hover:underline" href={'/category/' + props?.post?.category_id + '/posts'}>
                        {props?.post?.category?.name}
                    </a>
                </p>
            </div>
            <div className="mt-2 text-sm space-y-4">
                {TrimDescription(props?.post?.active_post_details?.[0]?.description)}
            </div>
            <div className="mt-6 flex justify-between space-x-2">
                <div className="flex space-x-6">
                    <span className="inline-flex items-center text-sm">
                          <span className="inline-flex space-x-2 text-gray-300">
                              <ThumbUpIcon className="h-5 w-5 cursor-default" aria-hidden="true"/>
                              <span className="font-bold">{props.post.upvotes_count}</span>
                              <span className="sr-only">upvotes</span>
                          </span>
                    </span>
                    <span className="inline-flex items-center text-sm">
                          <span className="inline-flex space-x-2 text-gray-300">
                              <ChatAltIcon className="h-5 w-5 cursor-default" aria-hidden="true"/>
                              <span className="font-bold">{props.post.comments_count}</span>
                              <span className="sr-only">comments</span>
                          </span>
                    </span>
                    <span className="inline-flex items-center text-sm">
                        <span className="inline-flex space-x-2 text-gray-300">
                            <EyeIcon className="h-5 w-5 cursor-default" aria-hidden="true"/>
                            <span className="font-bold">{props.post.views_count}</span>
                            <span className="sr-only">views</span>
                        </span>
                    </span>
                </div>
                <div className="flex text-sm">
                    <span className="inline-flex items-center text-sm">
                        <button type="button" className="inline-flex space-x-2 text-orange-500 text-gray-400 hover:text-gray-300">
                            <ShareIcon className="h-5 w-5" aria-hidden="true"/>
                            <span className="font-bold">Share</span>
                        </button>
                    </span>
                </div>
            </div>
        </article>
    );
}
