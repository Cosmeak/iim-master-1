//
//  TvShowsView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct TvShowsView: View {
    @StateObject var viewModel: TvShowsViewModel = TvShowsViewModel()
    var isLoading: Bool = false
    
    var body: some View {
        ZStack(alignment: Alignment(horizontal: .center, vertical: .top),  content: {
            List {
                ForEach (viewModel.tvShows) { tvShow in
                    NavigationLink(tvShow.title, destination: ReadTvShowView(tvShow: tvShow))
                }
            }
        })
        .onAppear {
            viewModel.getPopularTvShows()
        }
        
    }
}

#Preview {
    TvShowsView()
}
