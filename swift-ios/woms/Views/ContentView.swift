//
//  ContentView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct ContentView: View {
    @State var isAuthenticated = false
    @State var showingProfile = false
    
    var body: some View {
        Group {
            if isAuthenticated {
                TabView {
                    NavigationView {
                        IndexTvShowsView()
                            .navigationTitle("Series & Films")
                            .toolbar {
                                Button {
                                    showingProfile.toggle()
                                } label: {
                                    Label("User Profile", systemImage: "person.crop.circle")
                                }
                            }
                            .sheet(isPresented: $showingProfile) {
                                ProfileView()
                            }
                    }.tabItem { Label("Series & Films", systemImage: "movieclapper.fill") }
                    
                    
                    NavigationView {
                        IndexBooksView()
                            .navigationTitle("Books")
                            .toolbar {
                                Button {
                                    showingProfile.toggle()
                                } label: {
                                    Label("User Profile", systemImage: "person.crop.circle")
                                }
                            }
                            .sheet(isPresented: $showingProfile) {
                                ProfileView()
                            }
                    }.tabItem { Label("Books", systemImage: "books.vertical.fill") }
                    
                    NavigationView {
                        GamesView()
                            .navigationTitle("Games")
                            .toolbar {
                                Button {
                                    showingProfile.toggle()
                                } label: {
                                    Label("User Profile", systemImage: "person.crop.circle")
                                }
                            }
                            .sheet(isPresented: $showingProfile) {
                                ProfileView()
                            }
                    }.tabItem { Label("Games", systemImage: "gamecontroller.fill") }
                }
                
            } else {
                LoginView()
            }
        }
        .task {
            for await state in await supabase.auth.authStateChanges {
                if [.initialSession, .signedIn, .signedOut].contains(state.event) {
                    isAuthenticated = state.session != nil
                }
            }
        }
    }
}
