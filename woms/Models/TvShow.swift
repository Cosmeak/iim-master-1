//
//  TvShow.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class TvShow: Identifiable, ObservableObject, Codable {
    let id: Int
    let adult: Bool
    let backdrop_path: String
    let genre_ids: [Int]
    let original_language: String
    let original_title: String
    let overview: String
    let popularity: Float
    let poster_path: String
    let release_date: String
    let title: String
    let video: Bool
    let vote_average: Float
    let vote_count: Int
}
