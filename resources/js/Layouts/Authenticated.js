import React, {Fragment, useState} from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import {Menu, Popover, Transition} from "@headlessui/react";
import {
    BellIcon,
    FireIcon,
    HomeIcon,
    InformationCircleIcon,
    MenuIcon,
    QuestionMarkCircleIcon,
    XIcon
} from "@heroicons/react/outline";
import LeftSidebar from "@/Components/LeftSidebar";

const user = {
    name: 'Chelsea Hagon',
    email: 'chelseahagon@example.com',
    imageUrl:
        'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
}
const userNavigation = [
    {name: 'Your Profile', href: '#'},
    {name: 'Settings', href: '#'},
    {name: 'Sign out', href: '#'},
]
const navigation = [
    {name: 'Home', href: '#', icon: HomeIcon, current: true},
    {name: 'Ideas', href: '#', icon: FireIcon, current: false},
    {name: 'Questions', href: '#', icon: QuestionMarkCircleIcon, current: false},
    {name: 'Articles', href: '#', icon: InformationCircleIcon, current: false},
]
function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}
export default function Authenticated({children}) {
    return (
        <>
            <Popover as="header"
                className={({open}) =>
                    classNames(
                        open ? 'fixed inset-0 z-40 overflow-y-auto' : '', 'bg-white shadow-sm lg:static lg:overflow-y-visible'
                    )
                }
            >
                {({open}) => (
                    <>
                        <div className="max-w-7xl mx-auto p-4 sm:p-8 lg:px-8 lg:py-2">
                            <div className="relative flex justify-between lg:gap-8">
                                <div className="flex md:absolute md:left-0 md:inset-y-0 lg:static">
                                    <div className="flex-shrink-0 flex items-center">
                                        <a href="#">
                                            <ApplicationLogo/>
                                        </a>
                                    </div>
                                </div>
                                <div className="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
                                    {/* Mobile menu button */}
                                    <Popover.Button className="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500">
                                        <span className="sr-only">Open menu</span>
                                        {open ? (
                                            <XIcon className="block h-6 w-6" aria-hidden="true"/>
                                        ) : (
                                            <MenuIcon className="block h-6 w-6" aria-hidden="true"/>
                                        )}
                                    </Popover.Button>
                                </div>
                                <div className="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                                    <a href="#" className="ml-5 flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                        <span className="sr-only">View notifications</span>
                                        <BellIcon className="h-6 w-6" aria-hidden="true"/>
                                    </a>

                                    {/* Profile dropdown */}
                                    <Menu as="div" className="flex-shrink-0 relative ml-5">
                                        <div>
                                            <Menu.Button className="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                                <span className="sr-only">Open user menu</span>
                                                <img className="h-8 w-8 rounded-full" src={user.imageUrl} alt=""/>
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
                                            <Menu.Items className="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none">
                                                {userNavigation.map((item) => (
                                                    <Menu.Item key={item.name}>
                                                        {({active}) => (
                                                            <a href={item.href}
                                                                className={classNames(
                                                                    active ? 'bg-gray-100' : '',
                                                                    'block py-2 px-4 text-sm text-gray-700'
                                                                )}
                                                            >
                                                                {item.name}
                                                            </a>
                                                        )}
                                                    </Menu.Item>
                                                ))}
                                            </Menu.Items>
                                        </Transition>
                                    </Menu>
                                    <a href="#" className="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                        New Post
                                    </a>
                                </div>
                            </div>
                        </div>
                        <Popover.Panel as="nav" className="lg:hidden" aria-label="Global">
                            <div className="max-w-3xl mx-auto px-2 pt-2 pb-3 space-y-1 sm:px-4">
                                {navigation.map((item) => (
                                    <a key={item.name} href={item.href} aria-current={item.current ? 'page' : undefined}
                                        className={classNames(
                                            item.current ? 'bg-gray-100 text-gray-900' : 'hover:bg-gray-50',
                                            'block rounded-md py-2 px-3 text-base font-medium'
                                        )}
                                    >
                                        {item.name}
                                    </a>
                                ))}
                            </div>
                            <div className="border-t border-gray-200 pt-4">
                                <div className="max-w-3xl mx-auto px-4 flex items-center sm:px-6">
                                    <div className="flex-shrink-0">
                                        <img className="h-10 w-10 rounded-full" src={user.imageUrl} alt=""/>
                                    </div>
                                    <div className="ml-3">
                                        <div className="text-base font-medium text-gray-800">{user.name}</div>
                                        <div className="text-sm font-medium text-gray-500">{user.email}</div>
                                    </div>
                                    <button type="button" className="ml-auto flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                        <span className="sr-only">View notifications</span>
                                        <BellIcon className="h-6 w-6" aria-hidden="true"/>
                                    </button>
                                </div>
                                <div className="mt-3 max-w-3xl mx-auto px-2 space-y-1 sm:px-4">
                                    {userNavigation.map((item) => (
                                        <a key={item.name} href={item.href} className="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">
                                            {item.name}
                                        </a>
                                    ))}
                                </div>
                            </div>
                            <div className="mt-6 max-w-3xl mx-auto px-4 sm:px-6">
                                <a href="#" className="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700">
                                    New Post
                                </a>
                            </div>
                        </Popover.Panel>
                    </>
                )}
            </Popover>
            <main>{children}</main>
        </>
    );
}