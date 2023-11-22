//
//  ContentView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct ContentView: View {
    var body: some View {
        NavigationView(content: {
            navView
        })
        .padding()
    }
    
    @ViewBuilder
    var navView: some View {
        TabView {
            IndexTvShowsView()
                .tabItem { Label("Series & Films", systemImage: "movieclapper.fill") }
            IndexBooksView()
                .tabItem { Label("Books", systemImage: "books.vertical.fill") }
            GamesView()
                .tabItem { Label("Games", systemImage: "gamecontroller.fill") }
        }
    }
}

#Preview {
    ContentView()
}
