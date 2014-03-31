//
//  ProfileViewController.m
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import "ProfileViewController.h"
#import "AppUser.h"
#import "MyPhoto.h"
#import "MyPhotoViewCell.h"
#import "Webservices.h"

@interface ProfileViewController ()

@end

@implementation ProfileViewController {

}



- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    // Do any additional setup after loading the view.
    AppUser *userdata = [Webservices login:@"charles.foster.offdensen@dethklok.com" withPassword:@"money"];
    if (userdata != nil) {
        self.username.text = [NSString stringWithFormat:@"%@ %@", userdata.firstName, userdata.lastName];
        self.email.text = userdata.email;
        self.profilePicture.image = userdata.profilePicture;
    }
    
    self.myPhotos = [Webservices getPhotoFeedWithUserId:userdata.u_id];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (NSInteger)collectionView:(UICollectionView *)view numberOfItemsInSection:(NSInteger)section {
    return [self.myPhotos count];
}

- (NSInteger)numberOfSectionsInCollectionView: (UICollectionView *)collectionView {
    return 1;
}

- (UICollectionViewCell *)collectionView:(UICollectionView *)cv cellForItemAtIndexPath:(NSIndexPath *)indexPath {
    MyPhotoViewCell *cell = [cv dequeueReusableCellWithReuseIdentifier:@"myPhotosViewCell" forIndexPath:indexPath];
    
    MyPhoto *currentPhoto = [self.myPhotos objectAtIndex:indexPath.row];
    cell.image.image = currentPhoto;
    cell.imageTitle.text = currentPhoto.description;
    
    return cell;
}

/*
#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender
{
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
}
*/

@end
