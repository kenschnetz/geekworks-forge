import React, {Fragment} from 'react'
import {
    ChatAltIcon,
    CodeIcon,
    DotsVerticalIcon,
    EyeIcon,
    FlagIcon,
    SearchIcon,
    ShareIcon,
    StarIcon,
    ThumbUpIcon,
} from '@heroicons/react/solid';
import Authenticated from "@/Layouts/Authenticated";
import LeftSidebar from "@/Components/LeftSidebar";
import RightSidebar from "@/Components/RightSidebar";
import Post from "@/Components/Post";

const tabs = [
    {name: 'Most Recent', href: '#', current: true},
    {name: 'Most Upvoted', href: '#', current: false},
    {name: 'Most Commented', href: '#', current: false},
]

function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}

export default function Feed(props) {
    return (
        <>
            <div className="min-h-full">
                <Authenticated>
                    <div className="py-5 px-4 sm:px-0">
                        <div className="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                            <LeftSidebar user={props?.user} active_tab={props?.active_tab} />
                            <main className="lg:col-span-6">
                                {props?.posts?.total > 0 ?
                                    <>
                                        <div className="sm:px-0">
                                            <div className="sm:hidden">
                                                <label htmlFor="post-tabs" className="sr-only">
                                                    Select a tab
                                                </label>
                                                <select
                                                    id="post-tabs"
                                                    className="block w-full rounded-md border-gray-300 text-base font-medium text-gray-900 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                                                    defaultValue={tabs.find((tab) => tab.current).name}
                                                >
                                                    {tabs.map((tab) => (
                                                        <option key={tab.name}>{tab.name}</option>
                                                    ))}
                                                </select>
                                            </div>
                                            <div className="hidden sm:block">
                                                <nav className="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                                                    {tabs.map((tab, tabIdx) => (
                                                        <a
                                                            key={tab.name}
                                                            href={tab.href}
                                                            aria-current={tab.current ? 'page' : undefined}
                                                            className={classNames(
                                                                tab.current ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700',
                                                                tabIdx === 0 ? 'rounded-l-lg' : '',
                                                                tabIdx === tabs.length - 1 ? 'rounded-r-lg' : '',
                                                                'group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10'
                                                            )}
                                                        >
                                                            <span>{tab.name}</span>
                                                            <span
                                                                aria-hidden="true"
                                                                className={classNames(
                                                                    tab.current ? 'bg-orange-500' : 'bg-transparent',
                                                                    'absolute inset-x-0 bottom-0 h-0.5'
                                                                )}
                                                            />
                                                        </a>
                                                    ))}
                                                </nav>
                                            </div>
                                        </div>
                                        <div className="mt-4">
                                            <div className="w-full">
                                                <label htmlFor="search" className="sr-only">
                                                    Search
                                                </label>
                                                <div className="relative">
                                                    <div className="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                                        <SearchIcon className="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                                    </div>
                                                    <input
                                                        id="search"
                                                        name="search"
                                                        className="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                                        placeholder="Search"
                                                        type="search"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div className="mt-4">
                                            <ul role="list" className="space-y-4">
                                                {props?.posts?.data?.map((post) => (
                                                    <li key={post.id} className="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                                                        <Post post={post}/>
                                                    </li>
                                                ))}
                                            </ul>
                                        </div>
                                    </> :
                                    <div className="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                                        No {props?.active_tab === 0 ? 'ideas' : (props?.active_tab === 1 ? 'questions' : 'articles')} found! Why not <a className="font-bold text-purple-500 text-underline" href={props?.active_tab === 0 ? 'idea' : (props?.active_tab === 1 ? 'question' : 'article')}>create one</a>?
                                    </div>
                                }
                            </main>
                            <RightSidebar/>
                        </div>
                    </div>
                </Authenticated>
            </div>
        </>
    )
}
