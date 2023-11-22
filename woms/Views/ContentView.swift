//
//  ContentView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct ContentView: View {
    var body: some View {
        TabView {
            NavigationView {
                IndexTvShowsView()
                    .navigationTitle("Series & Films")
            }.tabItem { Label("Series & Films", systemImage: "movieclapper.fill") }

            
            NavigationView {
                IndexBooksView()
                    .navigationTitle("Books")
            }.tabItem { Label("Books", systemImage: "books.vertical.fill") }
           
            NavigationView {
                GamesView()
                    .navigationTitle("Games")
            }.tabItem { Label("Games", systemImage: "gamecontroller.fill") }
        }
    }

}

#Preview {
    ContentView()
}
