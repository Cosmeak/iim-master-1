//
//  TvShowsViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class TvShowsViewModel: ObservableObject {
    @Published var tvShows: [TvShow]
    @Published var actualPage: Int = 1
    
    init() {
        self.tvShows = []
    }
    
    func getPopularTvShows(page:Int = 1, lang: String = "fr_FR") {
        guard let url = URL(string: "https://api.themoviedb.org/3/movie/popular?page=\(page)&language=\(lang)") else { return print("error url") }
        var request = URLRequest(url: url)
        request.httpMethod = "GET"
        request.setValue("Bearer \(TMDBToken)", forHTTPHeaderField: "Authorization")
        let task = URLSession.shared.dataTask(with: request) { (data, response, error) in
            if error != nil { return print(error as Any) }
            
            guard let data = data else { return print("No data") }
            
            do {
                let decoder = JSONDecoder()
                let decodedResponse = try decoder.decode(TMDBResponse.self, from: data)
                self.tvShows = decodedResponse.results
                self.actualPage = decodedResponse.page
            } catch {
                return print(error as Any)
            }
        }
        task.resume()
    }
}
