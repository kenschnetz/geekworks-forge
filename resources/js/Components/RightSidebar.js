import React from 'react'
const trending_users = [];
const trending_tags = [];

export default function RightSidebar() {
    return (
        <aside className="hidden lg:block lg:col-span-4">
            <div className="sticky top-4 space-y-4">
                <section aria-labelledby="who-to-follow-heading">
                    <div className="bg-white rounded-lg shadow">
                        <div className="p-6">
                            <h2 id="who-to-follow-heading" className="text-base font-bold text-purple-800">
                                Trending Users
                            </h2>
                            <div className="mt-6 flow-root">
                                <ul role="list" className="-my-4 divide-y divide-gray-200">
                                    {trending_users.count > 0 ? trending_users.map((user) => (
                                        <li key={user.handle} className="flex items-center py-4 space-x-3">
                                            <div className="flex-shrink-0">
                                                <img className="h-8 w-8 rounded-full" src={user.imageUrl} alt=""/>
                                            </div>
                                            <div className="min-w-0 flex-1">
                                                <p className="text-sm font-medium text-gray-900">
                                                    <a href={user.href}>{user.name}</a>
                                                </p>
                                            </div>
                                        </li>
                                    )) : <i>Not enough data</i>}
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section aria-labelledby="trending-heading">
                    <div className="bg-white rounded-lg shadow">
                        <div className="p-6">
                            <h2 id="trending-heading" className="text-base font-bold text-purple-800">
                                Trending Tags
                            </h2>
                            <div className="mt-6 flow-root">
                                <ul role="list" className="-my-4 divide-y divide-gray-200">
                                    {trending_tags.count > 0 ? trending_tags.map((tag) => (
                                        <li key={tag.id} className="flex py-4 space-x-3">
                                            <div className="min-w-0 flex-1">
                                                <p className="text-sm font-medium text-gray-900">
                                                    <a href="#">
                                                        #{tag.name}
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                    )) : <i>Not enough data</i>}
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </aside>
    );
}
