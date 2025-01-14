//
//  ProfileViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 23/11/2023.
//

import Foundation

class ProfileViewModel: ObservableObject {
    @Published var user: User?
    @Published var isLoading = false
    
    init() {
        self.getProfile()
    }
    
    func getProfile() {
        self.isLoading = true
        Task {
            do {
                let currentUser = try await supabase.auth.session.user
                let user: User = try await supabase.database
                    .from("profiles")
                    .select()
                    .eq("id", value: currentUser.id)
                    .single()
                    .execute()
                    .value
                DispatchQueue.main.sync {
                    self.user = user
                }
            } catch {
              debugPrint(error)
            }
        }
        self.isLoading = false 
    }
}
