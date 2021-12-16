import React from 'react'
import {FireIcon, HomeIcon, InformationCircleIcon, QuestionMarkCircleIcon, CogIcon} from "@heroicons/react/outline";

const navigation = [
    {name: 'Home', href: '/', icon: HomeIcon, id: 1},
    {name: 'Ideas', href: '/ideas', icon: FireIcon, id: 2},
    {name: 'Questions', href: '/questions', icon: QuestionMarkCircleIcon, id: 3},
    {name: 'Articles', href: '/articles', icon: InformationCircleIcon, id: 4},
    // {name: 'Admin Tools', href: '#', icon: CogIcon, current: false},
]
const categories = [
    {name: 'Items', href: '/category/1/posts'},
    {name: 'Monsters', href: '/category/2/posts'},
    {name: 'Hooks', href: '/category/3/posts'},
    {name: 'Abilities', href: '/category/4/posts'},
    {name: 'Locations', href: '/category/5/posts'},
    {name: 'Art', href: '/category/6/posts'},
    {name: 'Rules', href: '/category/7/posts'},
    {name: 'Misc', href: '/category/8/posts'},
]

function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}

export default function LeftSidebar(props) {
    return (
        <div className="hidden lg:block lg:col-span-2">
            <nav aria-label="Sidebar" className="sticky top-4 divide-y divide-gray-300">
                <div className="pb-4 space-y-1">
                    {navigation.map((item) => (
                        <a
                            key={item.name}
                            href={item.href}
                            className={classNames(
                                (props?.active_tab === item.id || props?.active_tab === undefined) ? 'bg-gray-200 text-gray-500' : 'text-gray-600 hover:bg-gray-50',
                                'group flex items-center px-3 py-2 text-md font-medium rounded-md'
                            )}
                            aria-current={item.current ? 'page' : undefined}
                        >
                            <item.icon
                                className={classNames(
                                    props?.active_tab === item.id  ? 'text-gray-500' : 'text-purple-800 group-hover:text-gray-500',
                                    'flex-shrink-0 -ml-1 mr-3 h-6 w-6'
                                )}
                                aria-hidden="true"
                            />
                            <span className="truncate">{item.name}</span>
                        </a>
                    ))}
                </div>
                <div className="pt-6">
                    <p
                        className="px-3 text-xs font-semibold text-purple-800 uppercase tracking-wider"
                        id="communities-headline"
                    >
                        <strong>Categories</strong>
                    </p>
                    <div className="mt-3 space-y-2" aria-labelledby="communities-headline">
                        {categories.map((community) => (
                            <a
                                key={community.name}
                                href={community.href}
                                className="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50"
                            >
                                <span className="truncate">{community.name}</span>
                            </a>
                        ))}
                    </div>
                </div>
            </nav>
        </div>
    );
}
